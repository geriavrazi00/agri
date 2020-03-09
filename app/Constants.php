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

	//Roles of the system
	const ROLE_ADMIN = 1;
    const ROLE_WEB = 2;

    //Languages
    const ENGLISH_LANGUAGE = "en";
    const ALBANIAN_LANGUAGE = "sq";

    //Regular expressions
    const REG_EX_CURRENCY = "^\d{1,3}(,\d{3})*(\.\d+)?$";
}
