/*global $, jQuery, ajaxurl, like, like_message,bp_like_terms_like_message,bp_like_terms_unlike_message,bp_like_terms_like, unlike_message, view_likes, hide_likes, unlike_1, bp_like_terms, bp_like_terms_unlike_1, bp_like_terms_view_likes, bp_like_terms_hide_likes*/

jQuery(document).ready(function() {
    "use strict";
    jQuery('.author-box').each(function() {
        var id = jQuery(this).attr('id');
        jQuery(this).append(jQuery(id + ' .like-box'));
    });

    jQuery('.like, .unlike, .like_blogpost, .unlike_blogpost').live('click', function() {
        var type = jQuery(this).attr('class'), id = jQuery(this).attr('id');

        jQuery(this).addClass('loading');

        jQuery.post(ajaxurl, {
            action: 'activity_like',
            'cookie': encodeURIComponent(document.cookie),
            'type': type,
            'id': id
        },
            function(data) {
                jQuery('#' + id).fadeOut(100, function() {
                    jQuery(this).html(data).removeClass('loading').fadeIn(100);
                });

                // Swap from like to unlike
                var newID, pureID;
                if (type === 'like') {
                    newID = id.replace("like", "unlike");
                    jQuery('#' + id).removeClass('like').addClass('unlike').attr('title', bp_like_terms_unlike_message).attr('id', newID);
                } else if (type === 'like_blogpost') {
                    newID = id.replace("like", "unlike");
                    jQuery('#' + id).removeClass('like_blogpost').addClass('unlike_blogpost').attr('title', bp_like_terms_unlike_message).attr('id', newID);
                } else if (type === 'unlike_blogpost') {
                    newID = id.replace("unlike", "like");
                    jQuery('#' + id).removeClass('unlike_blogpost').addClass('like_blogpost').attr('title', bp_like_terms_unlike_message).attr('id', newID);
                } else {
                    newID = id.replace("unlike", "like");
                    jQuery('#' + id).removeClass('unlike').addClass('like').attr('title', bp_like_terms_like_message).attr('id', newID);
                }

                // Nobody else liked this, so remove the 'View Likes'
                if (data === bp_like_terms_like) {
                    pureID = id.replace("unlike-activity-", "");
                    jQuery('.view-likes#view-likes-' + pureID).remove();
                    jQuery('.users-who-like#users-who-like-' + pureID).remove();
                }

                // Show the 'View Likes' if user is first to like
                if (data === bp_like_terms_unlike_1) {
                    pureID = id.replace("like-activity-", "");
                    jQuery('li#activity-' + pureID + ' .activity-meta').append('<a href="" class="button view-likes" id="view-likes-' + pureID + '">' + bp_like_terms_view_likes + '</a><p class="users-who-like" id="users-who-like-' + pureID + '"></p>');
                }

            });

        return false;
    });

    jQuery('.view-likes').on('click', function() {
        var type, id, parentID;
        type = jQuery(this).attr('class');
        id = jQuery(this).attr('id');
        parentID = id.replace("view-likes", "users-who-like");

        if (!jQuery(this).hasClass('open')) {

            jQuery(this).addClass('loading');
            jQuery.post(ajaxurl, {
                action: 'activity_like',
                'cookie': encodeURIComponent(document.cookie),
                'type': type,
                'id': id
            },
                function(data) {
                    jQuery('#' + id).html(bp_like_terms_hide_likes).removeClass('loading').addClass('open');
                    jQuery('#' + parentID).html(data).slideDown('fast');
                });
            return false;

        }
        jQuery(this).html(bp_like_terms_view_likes).removeClass('loading, open');
        jQuery('#' + parentID).slideUp('fast');
        return false;

    });
});