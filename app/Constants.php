<?php

namespace App;

final class Constants {
	//Label categories
	const INVESTMENT_LABELS = 0;
	const BUSINESS_LABELS = 1;

	//Tax percentages
	const LOW = 0.075;
    const HIGH = 0.15;
    const LOW_THRESHOLD = 5000000;
	const HIGH_THRESHOLD = 14000000;

	//Loan fields
    const LOAN_FIELDS = 4;
    const LOAN_COLUMNS = 2;

    //Languages
    const ENGLISH_LANGUAGE = "en";
    const ALBANIAN_LANGUAGE = "sq";

    //Regular expressions
    const REG_EX_CURRENCY = "^\d{1,3}(,\d{3})*(\.\d+)?$";

    //Permission names
    const ROLE_LIST             = 'role-list';
    const CREATE_ROLE           = 'role-create';
    const EDIT_ROLE             = 'role-edit';
    const DELETE_ROLE           = 'role-delete';

    const PLAN_LIST             = 'plan-list';
    const CREATE_PLAN           = 'plan-create';
    const EDIT_PLAN             = 'plan-edit';
    const DELETE_PLAN           = 'plan-delete';

    const USER_LIST             = 'user-list';
    const CREATE_USER           = 'user-create';
    const EDIT_USER             = 'user-edit';
    const USER_PASSWORD         = 'user-password';
    const DELETE_USER           = 'user-delete';

    const COEFFICIENT_LIST      = 'coefficient-list';
    const CREATE_COEFFICIENT    = 'coefficient-create';
    const EDIT_COEFFICIENT      = 'coefficient-edit';
    const DELETE_COEFFICIENT    = 'coefficient-delete';

    const TAX_LIST              = 'tax-list';
    const CREATE_TAX            = 'tax-create';
    const EDIT_TAX              = 'tax-edit';
    const DELETE_TAX            = 'tax-delete';

    //Roles
    const ROLE_ADMIN_ID         = 2;
    const ROLE_INSTITUTION_ID   = 9;
    const ROLE_BASIC_USER       = 8;
}
