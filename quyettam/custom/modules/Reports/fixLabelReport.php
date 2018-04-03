<?php
    function fixLabel()
    {
        $js = 
        <<<EOQ
        <script>
        SUGAR.util.doWhen(
        function() {
           return $('#rowid1').find('td').eq(1)[0] != null;
        },
        function() {
            $("#filters").children().each(function(){
                $(this).find('td:eq(1)').find("select").remove();
                var label = $(this).find('td:eq(1)').text();
                // Fix label here
                debugger;
                label = label.replace("C_Ticket","Ticket");
                label = label.replace("TicketReport","Ticket");
                label = label.replace("Ticket Report","Ticket");
                label = label.replace("LBL_C_BOOKINGTICKET_C_TICKET_1_FROM_C_TICKET_TITLE","Booking Ticket");
                label = label.replace("LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE","Account");
                label = label.replace("LBL_CONTACTS_C_TICKET_1_FROM_C_TICKET_TITLE","Contact");
                // Report import Greensoft: replace Assigned User to Ticketing
                if ($('#record').val() == 'f342e60b-1e03-bccb-90be-5566861b2afc'){
                    label = label.replace("Assigned to User","Ticketing");
                }
                // -- End  fix label
                $(this).find('td:eq(1)').text(label);   
            });
            
        }        
        );
        </script>
EOQ;
        echo $js;    
    }

    fixLabel();
?>
