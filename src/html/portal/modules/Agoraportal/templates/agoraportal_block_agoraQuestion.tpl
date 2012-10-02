{ajaxheader modname=Agoraportal filename=Agoraportal.js}
<form id="acceptrefuseform" name="agoraQuestion" class="z-form" action='{modurl modname="Agoraportal" type="user" func="managerChoose"}' method="post">
    <fieldset>
        {gt text="El centre <b>"}{$clientName}{gt text="</b> t'ha designat com a gestor/a dels seus serveis a Àgora.
        <br />Si acceptes aquesta tasca, introdueix la paraula clau de confirmació que el propi centre t'ha d'haver proporcionat.
        <br /><br />Paraula clau de confirmació: "}
        <input type="text" name="verifyCode" /> 
        <br />
        <br />
        <input type="hidden" name="clientCode" value="{$clientCode}" />
        <input type="hidden" name="answer" value="" />
        <input type="button" name= "accept" value='{gt text="Accepto ser gestor/a"}' onclick="javascript:refuseAns(1);" />
        <input type="button" name= "refuse" value='{gt text="Rebutjo ser gestor/a"}' onclick="javascript:refuseAns(0);" />
    </fieldset>
</form>