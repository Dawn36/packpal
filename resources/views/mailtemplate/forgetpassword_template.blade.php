<p>Dear {{ucwords($msg['customer_name'])}}, <br>
    vielen Dank für Ihren Auftrag. <br>
    Um mit dem Unternehmen in Kontakt zu treten, bitten wir Sie {{$msg['commission']}}€ an das folgende Konto zu überweisen:<br>
    Bitte geben Sie als Verwendungszweck Ihre Auftragsnummer ein.<br>
    Netnetz<br>
    DE98 2415 1235 0075 2757 92<br>
    BIC: BRLADE21ROB<br>
    
    Sobald das Geld überwiesen ist, werden alle Kontaktdaten des Unternehmens für Sie ersichtlich und Sie können das weitere Vorgehen besprechen.<br>
    
    THE AD {{$msg['ads_name']}}<br>
    THE Company {{ucwords($msg['company_name'])}}<br>
    THE Company Nick Name {{ucwords($msg['nick_name'])}}</p>