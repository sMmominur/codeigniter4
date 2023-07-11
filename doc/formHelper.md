CodeIgniter's form helper functions 
CodeIgniter provides a set of form helper functions that simplify the process of generating HTML form elements and handling form data. These functions are available through the Form Helper, which is included by default in CodeIgniter 4. Here are some commonly used form helper functions in CodeIgniter 4:

1. `form_open()`: Generates the opening `<form>` tag.

```php
echo form_open('controller/method');
```

2. `form_close()`: Generates the closing `</form>` tag.

```php
echo form_close();
```

3. `form_input()`: Generates an input field.

```php
echo form_input('name', 'default value', 'class="form-control"');
```

4. `form_password()`: Generates a password input field.

```php
echo form_password('password', '', 'class="form-control"');
```

5. `form_textarea()`: Generates a textarea field.

```php
echo form_textarea('message', '', 'class="form-control"');
```

6. `form_dropdown()`: Generates a dropdown select field.

```php
$options = [
    'option1' => 'Option 1',
    'option2' => 'Option 2',
];
echo form_dropdown('dropdown', $options, 'option1', 'class="form-control"');
```

7. `form_checkbox()`: Generates a checkbox input field.

```php
echo form_checkbox('agree', 'yes', true);
```

8. `form_radio()`: Generates a radio button input field.

```php
echo form_radio('gender', 'male', true);
```

9. `form_submit()`: Generates a submit button.

```php
echo form_submit('submit', 'Submit', 'class="btn btn-primary"');
```

10. `form_label()`: Generates a label for a form element.

```php
echo form_label('Email', 'email');
```

These are just a few examples of the form helper functions available in CodeIgniter 4. You can refer to the CodeIgniter 4 documentation for a comprehensive list of form helper functions and their usage.

To use the form helper functions, make sure you have loaded the form helper either in your controller or in the application's autoload configuration file (`app/Config/Autoload.php`).

```php
helper('form');
```



form_open($action = '', $attributes = array(), $hidden = array())
echo form_open('form/submit', ['class' => 'my-form', 'id' => 'my-form-id'], ['csrf_token' => 'abc123']);

form_input($name, $value = '', $attributes = '')
echo form_input('name', '', 'id="name" class="form-control"');
echo form_input('email', 'user@example.com', 'id="email" placeholder="Enter your email"');


Here's a list of some commonly used form helper functions available in CodeIgniter 4:

1. `form_open()`: Generates the opening `<form>` tag.

2. `form_close()`: Generates the closing `</form>` tag.

3. `form_input()`: Generates an input field.

4. `form_password()`: Generates a password input field.

5. `form_textarea()`: Generates a textarea field.

6. `form_dropdown()`: Generates a dropdown select field.

7. `form_checkbox()`: Generates a checkbox input field.

8. `form_radio()`: Generates a radio button input field.

9. `form_submit()`: Generates a submit button.

10. `form_label()`: Generates a label for a form element.

11. `form_hidden()`: Generates a hidden input field.

12. `form_button()`: Generates a button element.

13. `form_file()`: Generates a file input field.

14. `form_multiselect()`: Generates a multi-select dropdown field.

15. `form_fieldset()`: Generates a fieldset element.

16. `form_field()`: Generates a generic form field.

17. `form_prep()`: Pre-processes form input data for safe output.

18. `form_error()`: Retrieves an error message for a specific form field.

19. `set_value()`: Sets the value of a form field, typically used for retaining user input after form validation.

These are just some of the commonly used form helper functions in CodeIgniter 4. You can refer to the CodeIgniter 4 documentation for a complete list of form helper functions and their usage.

Remember to load the form helper either in your controller or in the application's autoload configuration file (`app/Config/Autoload.php`) before using these functions.

```php
helper('form');
```

By utilizing these form helper functions, you can easily generate HTML form elements and handle form data in a convenient and secure manner in your CodeIgniter 4 applications.


<!DOCTYPE html>
<html>
<head>
    <title>My Form</title>
</head>
<body>
    <?php echo form_open('form/submit'); ?>

    <label for="name">Name:</label>
    <?php echo form_input('name', '', 'id="name" required'); ?>

    <label for="age">Age:</label>
    <?php echo form_input('age', '', 'id="age" required'); ?>

    <label for="password">Password:</label>
    <?php echo form_password('password', '', 'id="password" required'); ?>

    <label for="district">District:</label>
    <?php echo form_input('district', '', 'id="district" required'); ?>

    <label for="gender">Gender:</label>
    <?php
    $genderOptions = array(
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other'
    );
    echo form_dropdown('gender', $genderOptions, '', 'id="gender" required');
    ?>

    <label for="subject">Subject Choice:</label>
    <?php
    $subjectOptions = array(
        'math' => 'Mathematics',
        'science' => 'Science',
        'english' => 'English',
        'history' => 'History'
    );
    echo form_dropdown('subject', $subjectOptions, '', 'id="subject" required');
    ?>

    <label for="color">Color:</label>
    <?php echo form_input('color', '', 'id="color" required'); ?>

    <label for="agree">Agree to Terms:</label>
    <?php echo form_checkbox('agree', 'yes', false, 'id="agree" required'); ?>

    <label for="file">File Upload:</label>
    <?php echo form_upload('file', '', 'id="file"'); ?>

    <label for="message">Message:</label>
    <?php echo form_textarea('message', '', 'id="message" required'); ?>

    <?php echo form_submit('submit', 'Submit'); ?>

    <?php echo form_close(); ?>
</body>
</html>
