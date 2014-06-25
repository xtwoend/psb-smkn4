<?php namespace Xtwoend\Validators;

use Illuminate\Support\Facades\Validator;
use Xtwoend\Validators\AbstractValidator;

abstract class LaravelValidator extends AbstractValidator {

  /**
   * Replace placeholders with attributes
   *
   * @return array
   */
  public function replace()
  {
    $data = $this->data;
    $rules = $this->rules;

    array_walk($rules, function(&$rule) use ($data)
    {
      preg_match_all('/\{(.*?)\}/', $rule, $matches);

      foreach($matches[0] as $key => $placeholder)
      {
        if(isset($data[$matches[1][$key]]))
        {
          $rule = str_replace($placeholder, $data[$matches[1][$key]], $rule);
        }
      }
    });

    return $rules;
  }

  /**
   * Pass the data and the rules to the validator
   *
   * @return boolean
   */
  public function passes()
  {
    $rules = $this->replace();

    $validator = Validator::make($this->data, $rules);

    if( $validator->passes() )
    {
      return true;
    }

    $this->errors = $validator->messages();
  }

}
