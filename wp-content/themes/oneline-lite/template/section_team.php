<!-- TEAM SECTION START -->
<?php 
if(!oneline_lite_checkbox_filter('team','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
    $heading = get_theme_mod('team_heading','');
    $subheading = get_theme_mod('team_subheading','');
?>
<div class="team-wrapper">
<?php
echo oneline_lite_svg_enable();
?>
<section id="team" class="<?php echo svg_active();?>" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;">
    <div class="container">
        <div class="page-team">
               
            <div class="team-block">
			<h2>Terms</h2>
                <ul class="team-grid wow fadeInRight" data-wow-delay="0s">
                <?php
            if ( is_active_sidebar( 'multi-team-widget' ) ){
                    dynamic_sidebar( 'multi-team-widget' );
                 } else {
                 //echo do_shortcode("[themehunk-customizer-oneline-lite did='2']");
                    } ?>
					<li>Max 20,000,000 vtag tokens will be shared between the participants. Each stage upon completion will allow tokens issued to be doubled. There are a total of 8 stages and the first stage starts with 20vtags. Stage 8 will give a total token of 10,240 vtags </li>
					<li>20,000 vtags is equivalent to 1 ETH during current stage.</li>
					<li>Read rules carefully, otherwise you will be disqualified.</li>
					<li>Stay a subscriber until then end of the ICO</li>
					<li>Joining with multiple accounts is not allowed. Users found to be using multi accounts will be disqualified</li>
					<li>Airdrop will end on 30th Dec 2018. ICO will end on 15th Jan 2019. vtags will be issued on 15th Jan 2019 and can be traded immediately</li>
					<br/>
					<br/>
                </ul>
            </div>
        </div>
    </div>
</section>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php endif ;?>
<style>
.team-block ul li, .team-block ul {color:#FFF !important;text-align:left;list-style-type:disc;line-height:31px;}
.team-block h2 {
    text-align: left;
    color: #FFF;
}
.team-block {
    display: block;
    float: left;
    width: 100%;
    padding-top: 80px;
    margin-left: 23px;
    padding-left: 18px;
}
</style>