# Prevent iPhone and iPad to autoscale the page when rotated (http://adactio.com/journal/4470/)
preventAutoscale = ->
	viewportmeta = document.querySelector 'meta[name="viewport"]'
	
	if viewportmeta
	    viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0'
	    document.body.addEventListener 'gesturestart',
		-> viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6'
		false


# Hide the address bar on iPhone
hideAddressBar = ->
	setTimeout ->
		scrollTo(0, 1)
	, 100


scrollToContentOnSingle = ->
	if document.body.className.match /single/i
		header_height = document.querySelector('[role="complementary"]').getBoundingClientRect().height
		scrollTo(0, header_height)


# Run

if navigator.userAgent.match /iPhone/i or navigator.userAgent.match /iPad/i
	preventAutoscale()
	hideAddressBar()
	scrollToContentOnSingle()