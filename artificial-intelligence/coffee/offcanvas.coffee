(($) ->
	
	# Offcanvas menus
	
	offcanvas = (side) ->
		if typeof side isnt 'string' then side = 'left'
		$('#www').toggleClass 'offcanvas-' + side
		false
	
	resetOffcanvas = ->
		if $('#www').hasClass 'offcanvas-left'  then offcanvas 'left'
		if $('#www').hasClass 'offcanvas-right' then offcanvas 'right'
		false
	
	$('.nav-mobile-toggle').click offcanvas
	$('[title="Offcanvas Right"]').click ->
		offcanvas 'right'
		false
	
	$('.reset-offcanvas-1').click    resetOffcanvas
	$('.reset-offcanvas-2').dblclick resetOffcanvas
	
	
) jQuery
