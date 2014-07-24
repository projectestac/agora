<?php
/**
 * Class SlideshowPluginSlideInserter
 *
 * TODO This class will probably need to be renamed to SlideshowPluginSlideHandler to explain more functionality
 * TODO than just inserting slides.
 *
 * @since 2.0.0
 * @author Stefan Boonstra
 */
class SlideshowPluginSlideInserter
{
	/**
	 * Returns the html for showing the image insert button.
	 *
	 * @since 2.0.0
	 * @return String $button
	 */
	static function getImageSlideInsertButton()
	{
		// Put popup html in footer
		add_action('admin_footer', array(__CLASS__, 'includePopup'));

		// Return button html
		ob_start();
		include(SlideshowPluginMain::getPluginPath() . '/views/' . __CLASS__ . '/insert-image-button.php');
		return ob_get_clean();
	}

	/**
	 * Returns the html for showing the text insert button.
	 *
	 * @since 2.0.0
	 * @return String $button
	 */
	static function getTextSlideInsertButton()
	{
		// Return button html
		ob_start();
		include(SlideshowPluginMain::getPluginPath() . '/views/' . __CLASS__ . '/insert-text-button.php');
		return ob_get_clean();
	}

	/**
	 * Returns the html for showing the video insert button.
	 *
	 * @since 2.1.0
	 * @return String $button
	 */
	static function getVideoSlideInsertButton()
	{
		// Return button html
		ob_start();
		include(SlideshowPluginMain::getPluginPath() . '/views/' . __CLASS__ . '/insert-video-button.php');
		return ob_get_clean();
	}

	/**
	 * Returns a list of element tags, without special characters.
	 *
	 * @since 2.2.20
	 * @return array $elementTags
	 */
	static function getElementTags()
	{
		return array(
			0 => 'div',
			1 => 'p',
			2 => 'h1',
			3 => 'h2',
			4 => 'h3',
			5 => 'h4',
			6 => 'h5',
			7 => 'h6',
		);
	}

	/**
	 * Get a specific element tag by its ID. If no ID is passed, the first value in the element tags array will be
	 * returned.
	 *
	 * @since 2.2.20
	 * @param int $id
	 * @return array $elementTags
	 */
	static function getElementTag($id = null)
	{
		$elementTags = self::getElementTags();

		if (isset($elementTags[$id]))
		{
			return $elementTags[$id];
		}

		return reset($elementTags);
	}

	/**
	 * This function is registered in the SlideshowPluginAjax class
	 * and prints the results from the search query.
	 *
	 * @since 2.0.0
	 */
	static function printSearchResults()
	{
		global $wpdb;

		// Numberposts and offset
		$numberPosts = 10;
		$offset      = 0;

		if (isset($_POST['offset']) &&
			is_numeric($_POST['offset']))
		{
			$offset = $_POST['offset'];
		}

		$attachmentIDs = array();

		if (isset($_POST['attachmentIDs']))
		{
			$attachmentIDs = array_filter($_POST['attachmentIDs'], 'ctype_digit');
		}

		// Get attachments with a title alike the search string, needs to be filtered
		add_filter('posts_where', array(__CLASS__, 'printSearchResultsWhereFilter'));
		$query = new WP_Query(array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'offset'         => $offset,
			'posts_per_page' => $numberPosts + 1,
			'orderby'        => 'date',
			'order'          => 'DESC'
		));
		$attachments = $query->get_posts();
		remove_filter('posts_where', array(__CLASS__, 'printSearchResultsWhereFilter'));

		// Look for images by their file's name when not enough matching results were found
		if (count($attachments) < $numberPosts)
		{
			$searchString = esc_sql($_POST['search']);

			// Add results found with the previous query to the $attachmentIDs array to exclude them as well
			foreach ($attachments as $attachment)
			{
				$attachmentIDs[] = $attachment->ID;
			}

			// Search by file name
			$fileNameQuery = new WP_Query(array(
				'post_type'      => 'attachment',
				'post_status'    => 'inherit',
				'posts_per_page' => $numberPosts - count($attachments),
				'post__not_in'   => $attachmentIDs,
				'meta_query'     => array(
					array(
						'key'     => '_wp_attached_file',
						'value'   => $searchString,
						'compare' => 'LIKE'
					)
				)
			));

			// Put found results in attachments array
			$fileNameQueryAttachments = $fileNameQuery->get_posts();

			if (is_array($fileNameQueryAttachments) &&
				count($fileNameQueryAttachments) > 0)
			{
				foreach ($fileNameQueryAttachments as $fileNameQueryAttachment)
				{
					$attachments[] = $fileNameQueryAttachment;
				}
			}
		}

		// Check if there are enough attachments to print a 'Load more images' button
		$loadMoreResults = false;

		if (count($attachments) > $numberPosts)
		{
			array_pop($attachments);

			$loadMoreResults = true;
		}

		// Print results to the screen
		if (count($attachments) > 0)
		{
			if ($offset > 0)
			{
				echo '<tr valign="top">
					<td colspan="3" style="text-align: center;">
						<b>' . count($attachments) . ' ' . __('More results loaded', 'slideshow-plugin') . '<b>
					</td>
				</tr>';
			}

			foreach ($attachments as $attachment)
			{
				$image = wp_get_attachment_image_src($attachment->ID);

				if (!is_array($image) ||
					!$image)
				{
					if (!empty($attachment->guid))
					{
						$imageSrc = $attachment->guid;
					}
					else
					{
						continue;
					}
				}
				else
				{
					$imageSrc = $image[0];
				}

				if (!$imageSrc ||
					empty($imageSrc))
				{
					$imageSrc = SlideshowPluginMain::getPluginUrl() . '/images/SlideshowPluginPostType/no-img.png';
				}

				echo '<tr valign="top" data-attachment-Id="' . $attachment->ID . '" class="result-table-row">
					<td class="image">
						<img width="60" height="60" src="' . $imageSrc . '" class="attachment" alt="' . $attachment->post_title . '" title="' . $attachment->post_title . '">
					</td>
					<td class="column-title">
						<strong class="title">' . $attachment->post_title . '</strong>
						<p class="description">' . $attachment->post_content . '</p>
					</td>
					<td class="insert-button">
						<input
							type="button"
							class="insert-attachment button-secondary"
							value="' . __('Insert', 'slideshow-plugin') . '"
						/>
					</td>
				</tr>';
			}

			if ($loadMoreResults)
			{
				echo '<tr>
					<td colspan="3" style="text-align: center;">
						<button class="button-secondary load-more-results" data-offset="' . ($offset + $numberPosts) . '">
							' . __('Load more results', 'slideshow-plugin') . '
						</button>
					</td>
				</tr>';
			}
		}
		else
		{
			echo '<tr>
				<td colspan="3" style="text-align: center;">
					<a href="' . admin_url() . 'media-new.php" target="_blank">
						' . __('No images were found, click here to upload some.', 'slideshow-plugin') . '
					</a>
				</td>
			</tr>';
		}

		die;
	}

	/**
	 * Applies a where clause on the get_posts call from self::printSearchResults()
	 *
	 * @since 2.0.0
	 * @param string $where
	 * @return string $where
	 */
	static function printSearchResultsWhereFilter($where)
	{
		global $wpdb;

		$searchString = $_POST['search'];
		$searchString = esc_sql($searchString);

		if (isset($_POST['search']))
		{
			$where .= $wpdb->prepare(
				" AND (post_title LIKE '%%%s%%' OR ID LIKE '%%%s%%') ",
				$searchString,
				$searchString
			);
		}

		return $where;
	}

	/**
	 * Include popup, needs to be called in the footer
	 *
	 * @since 2.0.0
	 */
	static function includePopup()
	{
		include(SlideshowPluginMain::getPluginPath() . '/views/' . __CLASS__ . '/search-popup.php');
	}

	/**
	 * Enqueues styles and scripts necessary for the media upload button.
	 *
	 * @since 2.2.12
	 */
	static function localizeScript()
	{
		// Return if function doesn't exist
		if (!function_exists('get_current_screen'))
		{
			return;
		}

        // Return when not on a slideshow edit page
        $currentScreen = get_current_screen();

        if ($currentScreen->post_type != SlideshowPluginPostType::$postType)
        {
            return;
        }

		wp_localize_script(
			'slideshow-jquery-image-gallery-backend-script',
			'slideshow_jquery_image_gallery_backend_script_editSlideshow',
			array(
				'data' => array(),
				'localization' => array(
					'confirm'       => __('Are you sure you want to delete this slide?', 'slideshow-plugin'),
					'uploaderTitle' => __('Insert image slide', 'slideshow-plugin')
				)
			)
		);
	}
}