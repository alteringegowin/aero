// NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
// IT'S ALL JUST JUNK FOR OUR DOCS!
// ++++++++++++++++++++++++++++++++++++++++++

!function ($) {

    $(function(){
        $(this).tooltip({
            selector: "a[rel=tooltip]"
        });
        
        $('#select01').change(function(r){
            var x = $(this).val();
            if(x == 'cancelled'){
                $("#total_pax_cancel").removeClass("disabled");
                $("#total_pax_delay").addClass("disabled");
                $("#total_pax_transfer").addClass("disabled");
                $("#total_pax_reroute").addClass("disabled");
                
                $("#total_pax_cancel").removeAttr("disabled", "disabled");
                $("#total_pax_delay").attr("disabled", "disabled");
                $("#total_pax_transfer").attr("disabled", "disabled");
                $("#total_pax_reroute").attr("disabled", "disabled");
                
                $("#total_pax_delay").val('');
                $("#total_pax_transfer").val('');
                $("#total_pax_reroute").val('');
            }else{
                $("#total_pax_delay").removeClass("disabled");
                $("#total_pax_transfer").removeClass("disabled");
                $("#total_pax_reroute").removeClass("disabled");
                $("#total_pax_cancel").addClass("disabled");
                
                $("#total_pax_delay").removeAttr("disabled");
                $("#total_pax_transfer").removeAttr("disabled");
                $("#total_pax_reroute").removeAttr("disabled");
                $("#total_pax_cancel").attr("disabled", "disabled");
                $("#total_pax_cancel").val("");
            
            }
        });
        
        
        //-------------------------------------------------------
        /*shows the loading div every time we have an Ajax call*/
        $("#loading").bind("ajaxSend", function(){
            $(this).show();
        }).bind("ajaxComplete", function(){
            $(this).hide();
        });
    //-------------------------------------------------------
        
    });
}(window.jQuery)