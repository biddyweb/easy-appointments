<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Unit testing driver.
 * 
 * This driver handles all the unit testing of the application. 
 * Custom methods (test categories) can be created in order to 
 * use different test groups on each testing
 */
class Unit_tests extends CI_Driver_Library {
    public $CI;
    public $valid_drivers;
    
    /**
     * Class Constructor
     */
    public function __construct() {
        $this->CI =& get_instance();
        // Add more subclasses to the following array to expand
        // the unit testing classes.
        $this->valid_drivers = array(
            'Unit_tests_appointments_model',
            'Unit_tests_customers_model',
            'Unit_tests_providers_model',
            'Unit_tests_services_model',
            'Unit_tests_settings_model',
            'Unit_tests_admins_model',
            'Unit_tests_secretaries_model'
        );
    }
    
    /**
     * Run all the available tests of the system. 
     * 
     * If a new group of tests is added, it should be also added in
     * this method, in order to be executed when all the tests need to 
     * be run.
     * 
     * @task In order to run the tests the user must be logged in as admin.
     */
    public function run_all_tests() {
        $this->run_model_tests(false);
        $this->run_library_tests(false);
        $this->CI->output->append_output($this->CI->unit->report());
    }
    
    ///////////////////////////////////////////////////////////////////////////
    // UNIT TEST GROUPS
    ///////////////////////////////////////////////////////////////////////////
    /**
     * Run all the models tests.
     * 
     * @param bool $output_report Determines wether the test 
     * report will be outputted.
     */
    public function run_model_tests($output_report = true) {
        // @task Reenable all model tests.
        $this->appointments_model->run_all();
        $this->customers_model->run_all();
        $this->settings_model->run_all();
        $this->providers_model->run_all();
        $this->services_model->run_all();
        $this->admins_model->run_all();
        $this->secretaries_model->run_all();
        
        if ($output_report) {
            $this->CI->output->append_output($this->CI->unit->report());
        }
    }
    
    /**
     * Run all the library tests.
     * 
     * @param bool $output_report Determines wether the test 
     * report will be outputted.
     */
    public function run_library_tests($output_report = true) {
        // @task Implement unit tests for the libraries.
        if ($output_report) {
            $this->CI->output->append_output($this->CI->unit->report());
        }
    }   
}