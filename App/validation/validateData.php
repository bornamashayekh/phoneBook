<?php
namespace App\validation;
// this version is coded seperatly
use App\Traits\ResponseTrait;

class validateData
{
    use ResponseTrait;

    public function validate($fields = [], $request)
    {
        if (count($fields)) {
            $isError = false;
            $errorMessages = [];

            foreach ($fields as $field) {
                $items = explode('||', $field);
                $itemsCount = count($items);

                if ($itemsCount == 2) {
                    $validationParamString = $items[1]; // $items[1] is the validation string
                    $validations = explode('|', $validationParamString);
                    $key = $items[0]; // $items[0] is the actual field key

                    foreach ($validations as $validation) {
                        // required validation
                        if ($validation == 'required') {
                            if (!isset($request->$key) || empty($request->$key)) {
                                $isError = true;
                                array_push($errorMessages, "لطفا " . translate_key($key) . " را وارد کنید");
                            }
                        }

                        // string validation
                        if ($validation == 'string') {
                            if (isset($request->$key) && !is_string($request->$key)) {
                                $isError = true;
                                array_push($errorMessages, "مقدار " . translate_key($key) . " باید یک رشته باشد");
                            }
                        }

                        // integer validation
                        if ($validation == 'int' || $validation == 'number') {
                            if (isset($request->$key) && !is_int($request->$key)) {
                                $isError = true;
                                array_push($errorMessages, "مقدار " . translate_key($key) . " باید یک عدد باشد");
                            }
                        }

                        // boolean validation
                        if ($validation == 'bool' || $validation == 'boolean') {
                            if (isset($request->$key) && !is_bool($request->$key)) {
                                $isError = true;
                                array_push($errorMessages, "مقدار " . translate_key($key) . " باید یک عبارت منطقی باشد");
                            }
                        }

                        // min length validation
                        if (str_contains($validation, 'min')) {
                            $min_value = (int) explode(':', $validation)[1];
                            if (isset($request->$key) && mb_strlen($request->$key) < $min_value) {
                                $isError = true;
                                array_push($errorMessages, "مقدار " . translate_key($key) . " باید حداقل " . $min_value . " کاراکتر باشد");
                            }
                        }

                        // max length validation
                        if (str_contains($validation, 'max')) {
                            $max_value = (int) explode(':', $validation)[1];
                            if (isset($request->$key) && mb_strlen($request->$key) > $max_value) {
                                $isError = true;
                                array_push($errorMessages, "مقدار " . translate_key($key) . " نمی‌تواند بیشتر از " . $max_value . " کاراکتر باشد");
                            }
                        }
                        if (str_contains($validation, 'length')) {
                            $length = (int) explode(':', $validation)[1];
                            if (isset($request->$key) && mb_strlen($request->$key) != $length) {
                                $isError = true;
                                array_push($errorMessages, "مقدار " . translate_key($key) . " باید  " . $length . " کاراکتر باشد");
                            }
                        }
                    }
                } else if ($itemsCount == 1) {
                    if (!isset($request->$field) || empty($request->$field)) {
                        $isError = true;
                        array_push($errorMessages, "لطفا " . translate_key($field) . " را وارد کنید");
                    }
                } else {
                    $this->sendResponse(message: "ورودی‌های شما نامعتبر هستند", error: true, status: HTTP_BadREQUEST);
                    return exit();
                }
            }

            if ($isError) {
                $this->sendResponse(message: $errorMessages, error: true, status: HTTP_BadREQUEST);
                return exit();
            }

            return true;
        }
    }
}
