<div id='news_userselector'>
    <form class='z-form' method='post' id='news_userselector_form' action="#" enctype="application/x-www-form-urlencoded">
    <fieldset>
            <legend>{gt text='Article Author'}</legend>
            <div class="z-formrow">
                <label for="userselector">{gt text='Select a new article author'}</label>
                {selector_user selectedValue=$id id='userselector' name='userselector'}
            </div>
            <div class="z-formrow">
                <label for="destination">{gt text='Save and return to'}...</label>
                <div id='destination'>
                    <input type='radio' name='destination' id='destination_form' value='form' checked='checked' />
                    <label for="destination_form">{gt text='Modify form'}</label>
                    <input type='radio' name='destination' id='destination_list' value='list' />
                    <label for="destination_list">{gt text='Article list'}</label>
                </div>
            </div>
        </fieldset>
    </form>
</div>