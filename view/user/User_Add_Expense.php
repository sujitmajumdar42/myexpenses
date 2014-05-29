<script>
    $(document).ready(function() {
        $('#select-choice-c').change(function() {


            $('input[name="includeUser[]"]').each(function() {
                //alert($(this).attr('value')+" : "+$('#select-choice-c').val());
                if ($(this).attr('value') == $('#select-choice-c').val()) {
                    //alert("#"+$(this).attr("id"));
                    $("#"+$(this).attr("id")).prop('checked', true).checkboxradio('refresh');
                    $("#"+$(this).attr("id")).attr("disabled", true).checkboxradio('refresh');
                }
                else {
                     $("#"+$(this).attr("id")).prop('checked', false).checkboxradio('refresh');
                    $("#"+$(this).attr("id")).attr("disabled", false).checkboxradio('refresh');
                }

            });
        });


        $("#popupBasic").css('display', 'none', 'important');
        $("#AddExpense").click(function() {
            var selectedUsers = [];
            $('input[name="includeUser[]"]:checked').each(function() {
                selectedUsers.push($(this).attr('value'));
            });
            user = $('select[name="user"] option:selected').val();
            totAmount = $('input[name="totAmount"]').val();
            dateDay = $('select[name="dateDay"]').val();
            dateMonth = $('select[name="dateMonth"]').val();
            dateYear = $('select[name="dateYear"]').val();
            purpose = $('select[name="purpose"]').val();

            $.ajax({
                type: "POST",
                url: "core/controller/Serv_Add_Expenses.php",
                data: {user: user, totAmount: totAmount, dateDay: dateDay, dateMonth: dateMonth, dateYear: dateYear, purpose: purpose, includeUser: selectedUsers},
                success: function(html) {
                    //alert(html);
                    $("#expenseStatus").append(html).append('<br/><a href="#" class="ui-btn ui-btn-inline" data-rel="back">OK</a>');
                    $("#expenseLink").click();
                },
                beforeSend: function()
                {

                }
            });
            return false;
        });
    });
</script>
<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Add Expenses</li>
    <li>
        <!--core/controller/Serv_Add_Expenses.php-->
        <form method="post" action="./" data-ajax="false">
            <label for="select-choice-c" class="select">Choose User:</label>
            <select name="user" id="select-choice-c">
                <option value="select">Select</option>
                <option value="sujit1234">Sujit</option>
                <option value="sashi1234">Sashi</option>
                <option value="swagat1234">Swagat</option>
                <option value="subho1234">Subho</option>
                <option value="biswa1234">Biswa</option>
            </select>
            <br/>
            <label for="name-c">Amount:</label>
            <input type="text" name="totAmount" id="name-c" value=""  />
            <br/>
            <fieldset data-role="controlgroup" data-type="horizontal">
                <legend>Date : </legend>

                <label for="SelUKResidMonth">Month</label>
                <select name="dateMonth" id="SelUKResidMonth">
                    <option>Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                </select>

                <label for="SelUKResidDay">Day</label>
                <select name="dateDay" id="SelUKResidDay">
                    <option>Day</option>
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                </select>

                <label for="SelUKResidYear">Year</label>
                <select name="dateYear" id="SelUKResidYear">
                    <option>Year</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2019">2009</option>
                </select>
            </fieldset>
            <br/>
            <label for="select-choice-c" class="select">Choose Purpose:</label>
            <select name="purpose" id="select-choice-c">
                <option value="veg">Vegetables</option>
                <option value="nonveg">Nonveg</option>
                <option value="grossory">Grossory</option>
                <option value="transportation">Transportation</option>
                <option value="food">Food</option>
            </select>
            <br/>
            <fieldset data-role="controlgroup" id="includeUserGroup">
                <legend>Include Others:</legend>
                <input type="checkbox" name="includeUser[]" id="checkbox-1a" class="custom" value="sujit1234" />
                <label for="checkbox-1a"><?php echo "Sujit"; ?></label>

                <input type="checkbox" name="includeUser[]" id="checkbox-2a" class="custom" value="sashi1234"  />
                <label for="checkbox-2a">Sashi</label>

                <input type="checkbox" name="includeUser[]" id="checkbox-3a" class="custom" value="swagat1234" />
                <label for="checkbox-3a">Swagat</label>

                <input type="checkbox" name="includeUser[]" id="checkbox-4a" class="custom" value="biswa1234" />
                <label for="checkbox-4a">Biswa</label>
                <input type="checkbox" name="includeUser[]" id="checkbox-5a" class="custom" value="subho1234" />
                <label for="checkbox-5a">Subho</label>
            </fieldset>
            <br/>
            <input type="submit" class="ui-btn ui-btn-inline" value="Add" id="AddExpense">
        </form>
    </li>
    <li>
        <a href="#popupDialog" style="display:none" id="expenseLink" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow">Delete page...</a>
        <div data-role="popup" id="popupDialog" data-overlay-theme="b" data-theme="b" data-dismissible="false" style="max-width:700px; width:480px">
            <div data-role="header" data-theme="a">
                <h1>Expense Status</h1>
            </div>
            <div role="main" class="ui-content" id="expenseStatus">
                <h3 class="ui-title"></h3>
            </div>
    </li>
</ul>