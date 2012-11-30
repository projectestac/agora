/* Based upon http://www.queness.com/post/152/simple-jquery-image-slide-show-with-semi-transparent-caption 
   Adjusted to prototype.js, E.Spaan, Jul 10 */

function slideShow(speed) {
	//set the opacity of all images to 0
	$$('#ssb_gallery a')[0].setStyle({ opacity: 0.0 });

	//get the first image and display it (set it to full opacity)
	$$('#ssb_gallery a:first')[0].setStyle({ opacity: 1.0 });

	//resize the width of the caption according to the image width
	$('ssb_caption').setStyle({width: $$('#ssb_gallery a')[0].down('img').getWidth()+'px' });

	//get the caption of the first image from REL attribute and display it
	$('ssb_caption_content').update($$('#ssb_gallery a:first')[0].down('img').readAttribute('rel'));

	//set the caption background to semi-transparent
	$('ssb_caption').setStyle({ opacity: 0.6 });

	//call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
    setInterval('nextimage()', speed);
}

function nextimage() {
	//if no IMGs have the show class, grab the first image
    current = $($$('#ssb_gallery a.show')[0] ?  $$('#ssb_gallery a.show')[0] : $$('#ssb_gallery a:first')[0]);

	//get next image, if it reached the end of the slideshow, rotate it back to the first image
	next = $(current.next('a') !== undefined ? current.next() : $$('#ssb_gallery a:first')[0]);

	//get next image caption
	caption = next.down('img').readAttribute('rel');	

	//prepare the next image
    next.setStyle({ opacity: 0.0 });
    next.addClassName('show');
    new Effect.Opacity(next, { from: 0.0, to: 1.0, duration: 1.0 });

	//hide the current image
    new Effect.Opacity(current, { from: 1.0, to: 0.0, duration: 1.0 });
    current.removeClassName('show');

	//update the caption
    new Effect.Opacity('ssb_caption_content', { from: 1.0, to: 0.0, duration: 0.1 });
	$('ssb_caption_content').update(caption);
    new Effect.Opacity('ssb_caption_content', { from: 0.0, to: 1.0, duration: 1.0 });
}