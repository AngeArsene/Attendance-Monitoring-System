<?php

    $parent = ($table_name === 'student') ? ',parent' : '';
    $parent_val = ($table_name === 'student') ? ',:parent' : '';

    $dob = ($table_name === 'student') ? 'dob,' : '';
    $dob_val = ($table_name === 'student') ? ':dob,' : '';

    $admin = ($table_name === 'administrator') ? '' : ',registered_by';
    $admin_val = ($table_name === 'administrator') ? '' : ',' . $_POST['registered_by'];

    $department = ($table_name === 'teacher') ? 'department,' : '';
    $department_value = ($table_name === 'teacher') ? ':department,' : '';
    $dep = "department = :department,";