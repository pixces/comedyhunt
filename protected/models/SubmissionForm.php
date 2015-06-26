<?php

/**
 * SubmissionForm class.
 * SubmissionForm is the data structure for keeping
 * submission form data. It is used by the 'index' action of 'SiteController'.
 */
class SubmissionForm extends CFormModel
{
    public $username;
    public $email;
    public $url;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, url are required
            array('username, email, url', 'required'),
            // email has to be a valid email address
            array('email', 'email'),
        );
    }


}