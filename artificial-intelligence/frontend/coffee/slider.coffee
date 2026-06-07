( ($) ->
	
	# Responsive behavior
	$win = $ window
	vp = $win.width()
	
	$win.resize ->
		vp = $win.width()
	
	# Slider
	
	$slider = $ '.slidesjs'
	
	doSlider = ->
		
		sliderArgs =
			width: $win.width()
			height: $win.height()
			
			navigation:
				active: false
				effect: "fade"
				
			pagination:
				active: true
				effect: "fade"
				
			play:
				active: false
				effect: "fade"
				interval: 5000
				auto: true
				
			effect:
				fade:
					speed: 500
					crossfade: true
			
		
		$slider.slidesjs sliderArgs
	
	startFade = ->
		$slider.css 'background', '#000'
		$body.css 'position', 'fixed'
		$c.css 'textShadow', '2px 2px 10px #000'
	
	endFade = ->
		$slider.css 'background', ''
		doSlider()
		$body.css 'position', 'initial'
		$c.css 'text-shadow', ''
	
	if vp > 991
		if $('#main').hasClass('fade-slide')
			$slide = $('.slide').first()
			slider = $slider.length
			
			$h = $ '#header'
			$hshowcase = $ '#header-showcase'
			$body = $ 'body'
			
			$h1 =  $slide.find 'h1'
			$h2 =  $slide.find 'h2'
			$p =   $slide.find 'p'
			$c =   $slide.find '> .c'
			$pag = $('.slidesjs-pagination').first() if slider?
			
			tl = new TimelineMax {
				onStart: startFade
				onComplete: endFade
			}
			
			tl.from $slide,     6, { autoAlpha: 0 }, 2
			tl.from $h1,        2, { autoAlpha: 0 }, 7
			tl.from $h2,        2, { autoAlpha: 0 }, 10
			tl.from $p,			    2, { autoAlpha: 0 }, 14
			tl.from $c,         2, { background: 'transparent' }, 12
			tl.from $pag,       2, { autoAlpha: 0 }, 14
			tl.from $h,         3, { autoAlpha: 0 }, 14
			tl.from $hshowcase, 3, { autoAlpha: 0 }, 14
			
		else
			doSlider()
	
) jQuery
