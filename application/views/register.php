<div class="row">
                <div class="span12">
                    <div class="well">
                        <center><H3>Please fill out the Register form </H3></center>
                        
                        <?php
                        $attr = array (
                        'class'=>'register_form'
                        ); //I can set the dynamics of the fieldset here. Such as centerd and so forth.

                        echo validation_errors();   //This shows on screen the validation errors that are generated by the validation rules in LoginController
                        echo form_fieldset('', $attr); //
                        echo form_open(''); //This makes the page run the checklogin function upon submission
                        /* The below is the input for the registration form. This should input the data into the database. */
                        
                        echo form_label('Create a Username : '); //This is where the user inputs their username
                        $data = array ( 
                            'id'=>'username',
                            'name'=>'username',
                            'size'=>'30%',
                            'value'=>set_value('text_class'),
                        );//This is the data going into the input box
                        
                        echo form_input($data); //This is the actual input box
                        echo form_error('username');

                        /*echo form_label('Enter your First name: '); //This is where the user inputs their first name
                        $data = array ( 
                            'id'=>'first_name',
                            'name'=>'Last Name',
                            'size'=>'30%',
                            'value'=>set_value('text_class'),
                        );//This is the data going into the input box
                        
                        echo form_input($data); //This is the actual input box
                        echo form_error('firstname');


                        echo form_label('Enter your Last name: '); //This is where the user inputs their last names
                        $data = array ( 
                            'id'=>'last_name',
                            'name'=>'Last Name',
                            'size'=>'30%',
                            'value'=>set_value('text_class'),
                        );//This is the data going into the input box
                        
                        echo form_input($data); //This is the actual input box
                        echo form_error('lastname'); */
                        
                        echo form_label('Enter your Email : '); //This is where the user inputs their e-mail addres
                        $data = array ( 
                            'name'=>'email',
                            'class'=>'text_class',
                            'size'=>'30%',
                            'value'=>set_value('email'),
                        );//This is the data going into the input box
                        
                        echo form_input($data); //This is the actual input box
                        echo form_error('email');

                        echo form_label('Enter your password : '); //This is where the user inputs their password
                        $data = array ( 
                            'id'=>'password',
                            'name'=>'password',
                            'size'=>'30%',
                            'value'=>set_value('text_class'),
                        );//This is the data going into the input box
                        
                        echo form_input($data); //This is the actual input box
                        echo form_error('password');


                       echo form_label('Confirm your password : '); //This is where the user confirms the password
                        $data = array ( 
                            'id'=>'confirmed_password',
                            'name'=>'confirmed_password',
                            'size'=>'30%',
                            'value'=>set_value('text_class'),
                        );//This is the data going into the input box
                        
                        echo form_input($data); //This is the actual input box
                        echo form_error('confirmed_password');


                        $data = array ( 
                            'name'=>'submit',
                            'class'=>'b_register',
                            'size'=>'30%',
                            'value'=>'Register'
                        ); //This dictates the size of the button
                        
                        echo form_submit($data); //This creates the submit button
                        
                        echo form_close();
                        echo form_fieldset_close();
                        ?>



                        </div>
                            
                    </div>
                </div>
            



