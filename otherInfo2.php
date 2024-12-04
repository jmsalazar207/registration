<div class="tab-pane" id="otherinfo2">
    <div class="user-block">
        <form 
        id="User_form_other_info" 
        name="User_form_other_info" 
        autocomplete="off" >
            <div class="col-sm-12">
                <input 
                type="hidden" 
                name="token" 
                value="<?=$_SESSION["token"]?>">
            </div>            
            <div 
            class="box" 
            style="border:0cm">
                <div class="box-body">
                    <!--Question 1-->
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    34. &nbsp;&nbsp;&nbsp; Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed.
                                </label>								
                            </div>										
                            <div class="col-md-4">												
                            </div>
                        </div>
                    </div>
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    &nbsp;&nbsp;&nbsp;a. within the third degree?:
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q1a" 
                                id="q1a_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q1a" 
                                id="q1a_no" 
                                value="no" 
                                required>
                                <label> 
                                    &nbsp NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    &nbsp;&nbsp;&nbsp;b. within the fourth degree (for Local Government Unit - Career Employees)?
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q1b" 
                                id="q1b_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp; YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q1b" 
                                id="q1b_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp; NO
                                </label>									
                            </div>											
                        </div>
                    </div>
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>												
                                <textarea 
                                class="form-control" 
                                name="q1b_details" 
                                id="q1b_details" 
                                style="text-transform: uppercase;"
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>  
                </div> 
            </div>


            <div class="box" style="border:0cm">
                <div class="box-body">
                    <!--Question 2-->
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    35. &nbsp;&nbsp;&nbsp; a. Have you ever been found guilty of any administrative offense? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q2a" 
                                id="q2a_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp; YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q2a" 
                                id="q2a_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp; NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q2a_details" 
                                id="q2a_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>

                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     b. Have you been criminally charged before any court?
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q2b" 
                                id="q2b_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q2b" 
                                id="q2b_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp No
                                </label>									
                            </div>											
                        </div>
                    </div>            
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>												
                            </div>																
                        </div>
                    </div>
                    <div class="form-group" style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-9">												
                            </div>										
                            <div class="col-md-1">
                                <label>
                                    Date Filed:
                                </label>												
                            </div>
                            <div class="col-md-2">
                                <input 
                                class="form-control" 
                                id="q2b_datefiled" 
                                name="q2b_datefiled" 
                                type="date"
                                max="<?=$today?>"
                                readonly>
                            </div>	
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" style="padding-top: 8px">
                            <div class="col-md-9">												
                            </div>										
                            <div class="col-md-1">
                                <label>
                                    Status of Case:
                                </label>												
                            </div>
                            <div class="col-md-2">
                                <input 
                                class="form-control" 
                                id="q2_status" 
                                name="q2_status" 
                                type="text" 
                                style="text-transform: uppercase;"
                                readonly>
                            </div>	
                        </div>
                    </div>	
                </div>
            </div>

            <div class="box" style="border:0cm">
                <div class="box-body">
                    <!--Question 3-->
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    36. &nbsp;&nbsp;&nbsp; Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q3" 
                                id="q3_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q3" 
                                id="q3_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp NO
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q3_details" 
                                id="q3_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>
                </div>
            </div>



            <div class="box" style="border:0cm">
                <div class="box-body">
                    <!--Question 4-->
                    <div class="form-group" style="width: 100%; float:left">
                        <div class="row" style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    37. &nbsp;&nbsp;&nbsp; Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q4" 
                                id="q4_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q4" 
                                id="q4_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp NO
                                </label>									
                            </div>											
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q4_details" 
                                id="q4_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>

                </div>
            </div>


            <div class="box" style="border:0cm">
                <div class="box-body">
                    <!--Question 5-->
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    38 &nbsp;&nbsp;&nbsp; a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q5a" 
                                id="q5a_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q5a" 
                                id="q5a_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp NO
                                </label>
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group" style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q5a_details" 
                                id="q5a_details" 
                                style="text-transform: uppercase;"
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>            
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    b. Have you resigned from the goverment service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q5b" 
                                id="q5b_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q5b" 
                                id="q5b_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp NO
                                </label>									
                            </div>											
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q5b_details" 
                                id="q5b_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>
                </div>
            </div>


            <div class="box" style="border:0cm">
                <div class="box-body">
                    <!--Question 6-->
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    39. Have you acquired the status of an immigrant or permanent resident of another country?
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q6" 
                                id="q6_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q6" 
                                id="q6_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp NO
                                </label>									
                            </div>											
                        </div>
                    </div>
            
                    <div class="form-group" style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details(country):
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q6_details" 
                                id="q6_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                    <?="";?>
                                </textarea>
                            </div>											
                        </div>
                    </div>	
                </div>
            </div>

            <div class="box" style="border:0cm">
                <div class="box-body">
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                                    </label>								
                            </div>										
                            <div class="col-md-4">												
                            </div>
                        </div>
                    </div>
                
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    a. Are you a member of any indigenous group? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q7a" 
                                id="q7a_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q7a" 
                                id="q7a_no" 
                                value="no"
                                required>
                                <label> 
                                    &nbsp NO
                                </label>
                            </div>
                        </div>
                    </div>
                
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q7a_details" 
                                id="q7a_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                    <?="";?>
                                </textarea>
                            </div>											
                        </div>
                    </div>	
                
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    b. Are you differently abled? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q7b" 
                                id="q7b_yes" 
                                value="yes"
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q7b" 
                                id="q7b_no" 
                                value="no"
                                required>
                                <label> &nbsp No</label>									
                            </div>											
                        </div>
                    </div>
                
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q7b_details" 
                                id="q7b_details" 
                                style="text-transform: uppercase;"
                                wrap="soft"
                                readonly>
                                    <?="";?>
                                </textarea>
                            </div>											
                        </div>
                    </div>

                    <div class="form-group" style="width: 100%; float:left">
                        <div 
                        class="row" 
                        style="padding-top: 8px">
                            <div class="col-md-8">
                                <label
                                class="requiredField">
                                    c. Are you a solo parent? 
                                </label>								
                            </div>										
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q7c" 
                                id="q7c_yes" 
                                value="yes" 
                                required>
                                <label> 
                                    &nbsp YES
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input 
                                type="radio" 
                                class="flat" 
                                name="q7c" 
                                id="q7c_no" 
                                value="no" 
                                required>
                                <label> 
                                    &nbsp NO
                                </label>									
                            </div>											
                        </div>
                    </div>
                    
                    <div 
                    class="form-group" 
                    style="width: 100%; float:left">
                        <div class="row">
                            <div class="col-md-8">												
                            </div>										
                            <div class="col-md-4">
                                <label>
                                    If YES, give details:
                                </label>
                                <textarea 
                                class="form-control" 
                                name="q7c_details" 
                                id="q7c_details" 
                                style="text-transform: uppercase;" 
                                wrap="soft"
                                readonly>
                                </textarea>
                            </div>											
                        </div>
                    </div>	
                </div>

                <div class="box-footer">
                    <button 
                    type="submit" 
                    name="submit_other_info" 
                    id="submit_other_info" 
                    class="btn btn-primary pull-right"> 
                        Save
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>