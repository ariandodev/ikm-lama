		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<?php if(!Yii::app()->user->isGuest): ?>
			<aside id="left-panel">
			<?php else: ?>
				<aside id="left-panel" style="display:none;">
				<?php endif; ?>
				<!-- User info -->
				<div class="login-info">
					<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 

						<a href="javascript:void(0);">
							<img src="uploads/pengguna/foto.jpg" alt="me" class="online" /> 
							<span>
								<?php /*echo Yii::app()->user->nama_pengguna;*/ ?>
							</span>
							<i class="fa fa-angle-down"></i>
						</a> 

					</span>
				</div>
				<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
		-->
		<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional hre="" links. See documentation for details.
			-->
			<ul>
				<?php if(!Yii::app()->user->isGuest): ?>
					<?php
					foreach ($page_nav as $key => $nav_item) {
							//process parent nav
						$nav_htm = '';
						$url = isset($nav_item["url"]) ? $nav_item["url"] : "#";
						$icon_badge = isset($nav_item["icon_badge"]) ? '<em>'.$nav_item["icon_badge"].'</em>' : '';
						$icon = isset($nav_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$nav_item["icon"].'">'.$icon_badge.'</i>' : "";
						$nav_title = isset($nav_item["title"]) ? $nav_item["title"] : "(No Name)";
						$label_htm = isset($nav_item["label_htm"]) ? $nav_item["label_htm"] : "";
						$is_ajax = isset($nav_item["ajax"]) && !$nav_item["ajax"] ? 'target = "_top"' : '';
						$nav_htm .= '<a href="'.$url.'" '.$is_ajax.' title="'.$nav_title.'">'.$icon.' <span class="menu-item-parent">'.$nav_title.'</span>'.$label_htm.'</a>';

						if (isset($nav_item["sub"]) && $nav_item["sub"])
							$nav_htm .= process_sub_nav($nav_item["sub"]);

						echo '<li>'.$nav_htm.'</li>';
					}
					endif;

					function process_sub_nav($nav_item) {
						$sub_item_htm = "";
						if (isset($nav_item["sub"]) && $nav_item["sub"]) {
							$sub_nav_item = $nav_item["sub"];
							$sub_item_htm = process_sub_nav($sub_nav_item);
						} else {
							$sub_item_htm .= '<ul>';
							foreach ($nav_item as $key => $sub_item) {
								$url = isset($sub_item["url"]) ? $sub_item["url"] : "#";
								$icon = isset($sub_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$sub_item["icon"].'"></i>' : "";
								$nav_title = isset($sub_item["title"]) ? $sub_item["title"] : "(No Name)";
								$label_htm = isset($sub_item["label_htm"]) ? $sub_item["label_htm"] : "";
								$is_ajax = isset($sub_item["ajax"]) && !$sub_item["ajax"] ? 'target = "_top"' : '';
								$sub_item_htm .= 
								'<li class="open">
								<a href="'.$url.'" '.$is_ajax.'>'.$icon.' '.$nav_title.$label_htm.'</a>
								'.(isset($sub_item["sub"]) ? process_sub_nav($sub_item["sub"]) : '').'
							</li>';
						}
						$sub_item_htm .= '</ul>';
					}
					return $sub_item_htm;
				}


				?>
			</ul>

		</nav>
		<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>

	</aside>
		<!-- END NAVIGATION -->

	<script type="text/javascript">
	window.isLogin =  <?php echo !Yii::app()->user->isGuest ? 'true' : 'false'; ?>;
	</script>