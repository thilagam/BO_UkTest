<?php /* Smarty version 2.6.19, created on 2013-07-16 13:38:02
         compiled from gebo/index/gebo_test.phtml */ ?>
<!--<script language="JavaScript" type="text/javascript" src="/BO/theme/gebo/js/gebo_charts.js"></script>-->
<?php echo '
<script language="JavaScript">
$(document).ready(function(){
	// Setup the placeholder reference
var   elem = $(\'#fl_2\');
   
	var data = [
		{
			label: "REFUSED ( 6 )",
			data: 6
		},
		{
			label: "VALIDATED ( 3 )",
			data: 3
		},
		{
			label: "DISAPPROVED ( 2 )",
			data: 2
		},
		{
			label: "CLOSED ( 5 )",
			data: 5
		},
		{
			label: "PUBLISHED ( 4 )",
			data: 4
		}
	];
	
	// Setup the flot chart using our data
	$.plot(elem, data,         
		{
			label: "Visitors by Location",
			series: {
				pie: {
					show: true,
					innerRadius: 0.5,
					highlight: {
						opacity: 0.2
					}
				}
			},
			grid: {
				hoverable: true,
				clickable: true
			},
			//colors: [ "#b3d3e8", "#8cbddd", "#65a6d1", "#3e8fc5", "#3073a0", "#245779", "#183b52" ]
			//colors: [ "#b4dbeb", "#8cc7e0", "#64b4d5", "#3ca0ca", "#2d83a6", "#22637e", "#174356", "#0c242e" ]
			colors: [ "#FAAA39", "#DFF0D8", "#F2DEDE", "#B94A48", "#468847" ]
		}
	);
	// Create a tooltip on our chart
	elem.qtip({
		prerender: true,
		content: \'Loading...\', // Use a loading message primarily
		position: {
			viewport: $(window), // Keep it visible within the window if possible
			target: \'mouse\', // Position it in relation to the mouse
			adjust: { x: 7 } // ...but adjust it a bit so it doesn\'t overlap it.
		},
		show: false, // We\'ll show it programatically, so no show event is needed
		style: {
			classes: \'ui-tooltip-shadow ui-tooltip-tipsy\',
			tip: false // Remove the default tip.
		}
	});
 
	// Bind the plot hover
	elem.on(\'plothover\', function(event, pos, obj) {
		
		// Grab the API reference
		var self = $(this),
			api = $(this).qtip(),
			previousPoint, content,
 
		// Setup a visually pleasing rounding function
		round = function(x) { return Math.round(x * 1000) / 1000; };
 
		// If we weren\'t passed the item object, hide the tooltip and remove cached point data
		if(!obj) {
			api.cache.point = false;
			return api.hide(event);
		}
 
		// Proceed only if the data point has changed
		previousPoint = api.cache.point;
		if(previousPoint !== obj.seriesIndex)
		{
			percent = parseFloat(obj.series.percent).toFixed(2);
			// Update the cached point data
			api.cache.point = obj.seriesIndex;
			// Setup new content
			//content = obj.series.label + \' ( \' + percent + \'% )\';
			content =  percent + \'%\';
			//content = obj.series.label + \' ( \' + round(obj.series.data[0][1]) + \' )\';
			// Update the tooltip content
			api.set(\'content.text\', content);
			// Make sure we don\'t get problems with animations
			//api.elements.tooltip.stop(1, 1);
			// Show the tooltip, passing the coordinates
			api.show(pos);
		}
	});
});	
</script>

'; ?>

<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li>
				<a href="/index"><i class="icon-home"></i></a>
			</li>
			<li>
				<a> L'affectation AO </a>
			</li>
			<li>
				<a href="/processao/profiles-list?submenuId=ML2-SL2">S&eacute;lection de profils</a>
			</li>			
		</ul>
	</div>
</nav>

<div class="row-fluid">
	<div class="span5">
		<h3 class="heading">Partcipations(20)</h3>
		<div id="fl_2" style="height:200px;width:80%;margin:50px auto 0"></div>
	</div>	
</div>