<?php

    $parent = ($table_name === 'student') ? ',parent' : '';
    $parent_val = ($table_name === 'student') ? ',:parent' : '';

    $dob = ($table_name === 'student') ? 'dob,' : '';
    $dob_val = ($table_name === 'student') ? ':dob,' : '';

    $admin = ($table_name === 'administrator') ? '' : ',registered_by';
    $admin_val = ($table_name === 'administrator') ? '' : ',' . $_POST['registered_by'];