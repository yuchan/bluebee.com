<?php
/** Variant.

See: {@link http://www.php.net/manual/en/ref.variant.php}
@package variant
*/

/*.

if_php_ver_4
	VARIANT_MODULE_NOT_AVAILABLE_UNDER_PHP4)
end_if_php_ver

require_module 'standard';

.*/

class com_exception extends Exception {};


/*. void .*/ function variant_set(/*. object .*/ $variant, /*. mixed .*/ $value){}
/*. mixed .*/ function variant_add(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_cat(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_sub(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_mul(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_and(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_div(/*. mixed .*/ $left, /*. mixed .*/ $right)
	/*. throws com_exception .*/ {}
/*. mixed .*/ function variant_eqv(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_idiv(/*. mixed .*/ $left, /*. mixed .*/ $right)
	/*. throws com_exception .*/ {}
/*. mixed .*/ function variant_imp(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_mod(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_or(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_pow(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_xor(/*. mixed .*/ $left, /*. mixed .*/ $right){}
/*. mixed .*/ function variant_abs(/*. mixed .*/ $left){}
/*. mixed .*/ function variant_fix(/*. mixed .*/ $left){}
/*. mixed .*/ function variant_int(/*. mixed .*/ $left){}
/*. mixed .*/ function variant_neg(/*. mixed .*/ $left){}
/*. mixed .*/ function variant_not(/*. mixed .*/ $left){}
/*. mixed .*/ function variant_round(/*. mixed .*/ $left, /*. int .*/ $decimals){}
/*. int .*/ function variant_cmp(/*. mixed .*/ $left, /*. mixed .*/ $right /*., args .*/){}
/*. int .*/ function variant_date_to_timestamp(/*. object .*/ $variant){}
/*. object .*/ function variant_date_from_timestamp(/*. int .*/ $timestamp){}
/*. int .*/ function variant_get_type(/*. object .*/ $variant){}
/*. void .*/ function variant_set_type(/*. object .*/ $variant, /*. int .*/ $type){}
/*. object .*/ function variant_cast(/*. object .*/ $variant, /*. int .*/ $type){}
