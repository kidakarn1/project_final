$(function(){
	$("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: false,
        transitionEffectSpeed: 300,
        onStepChanging: function (event, currentIndex, newIndex) {
            if ( newIndex === 1 ) {
            } else {
            }
            if ( newIndex === 2 ) {
            } else {

            }
            return true;
        }
    });
    // Custom Button Jquery Steps
    // $('.forward').click(function(){
    // 	$("#wizard").steps('next');
    // })
    // $('.backward').click(function(){
    //     $("#wizard").steps('previous');
    // })
    // Grid
    // $('.grid .grid-item').click(function(){
    //     $('.grid .grid-item').removeClass('active');
    //     $(this).addClass('active');
    // })
    // Click to see password
    // $('.password i').click(function(){
    //     if ( $('.password input').attr('type') === 'password' ) {
    //         $(this).next().attr('type', 'text');
    //     } else {
    //         $('.password input').attr('type', 'password');
    //     }
    // })
    // Date Picker
    // var dp1 = $('#dp1').datepicker().data('datepicker');
    // dp1.selectDate( new Date( ));
})
