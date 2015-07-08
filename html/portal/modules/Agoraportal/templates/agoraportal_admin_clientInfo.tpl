<div class="z-form">
    <fieldset style="background: #EEEEFF;">
        <legend>{gt text="Informació del client"}</legend>
        <strong>{gt text="Nom client"}</strong>: {$client.clientName}
        <br />
        <strong>{gt text="Codi"}</strong>: {$client.clientCode}
        <br />
        <strong>{gt text="Nom propi"}</strong>: {$client.clientDNS}
        <br />
        <strong>{gt text="Antic Nom propi"}</strong>: {$client.clientOldDNS}
        <br />
        <strong>{gt text="Adreça"}</strong>: {$client.clientAddress}, {$client.clientPC} - {$client.clientCity} ({$client.clientCountry})
        <br />
        <strong>{gt text="Descripció"}</strong>: {$client.clientDescription}
        <br />
        <strong>{gt text="Xarxa educat"}</strong>: {$client.educat}
    </fieldset>
</div>