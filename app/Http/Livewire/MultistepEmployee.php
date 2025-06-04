<?php

namespace App\Http\Livewire;
use App\Models\Department;
use App\Models\Designation;
use Livewire\WithFileUploads;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MultistepEmployee extends Component
{
    use WithFileuploads;



    public $name_english;
    public $name_bangla;
    public $father_name_english;
    public $father_name_bangla;
    public $mother_name_english;
    public $mother_name_bangla;
    public $spouse_name1;
    public $spouse_name2;
    public $date_of_birth;
    public $blood_group;
    public $gender;
    public $marital_status;
    public $present_address_english;
    public $present_address_bangla;
    public $permanent_address_bangla;
    public $nid;
    public $mobile;
    public $email;
    public $department_id;
    public $designation_id;
    public $date_of_join;
    public $commission_date;
    public $promotion_date;
    public $telephone_office;
    public $telephone_home;
    public $pbx;
    public $salary;
    public $emergency_contact;
    public $emergency_relation;
    public $employee_photo;
    public $employee_sign;

    public $employee_id;
    public $password;
    public $user_type;
    public $belongs_to;
    public $role_id;
    public $accesses;
    public $permissions;


    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }


    public function render()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('livewire.multistep-employee',compact('departments','designations'));
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps)
        {
            $this->currentStep = 1;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1)
        {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if($this->currentStep == 1)
        {
            $this->validate([
                'employee_id' => 'required|string',
                'name_english' => 'required|string',
                'father_name_english' => 'required|string',
                'mother_name_english' => 'required|string',
                'date_of_birth' => 'required',
                'gender' => 'required',
                'marital_status' => 'required',

            ]);
        }
        else if($this->currentStep == 2)
        {
            $this->validate([
                'present_address_english' => 'required',
                'nid' => 'required',
                'mobile' => 'required|min:11|numeric',
                'email' => 'required|email|unique:employees',
            ]);
        }
        else if($this->currentStep == 3)
        {
            $this->validate([
                'department_id' => 'required',
                'designation_id' => 'required',
                'date_of_join' => 'required',
                'commission_date' => 'required',
                'telephone_office' => 'required|min:11|numeric',
                'salary' => 'required',
            ]);
        }
    }

    public function register()
    {
        $this->resetErrorBag();
        if($this->currentStep == 4)
        {
            $this->validate([
                'emergency_contact' => 'required|min:11|numeric',
                'emergency_relation' => 'required|string',
            ]);
        }

        if($this->employee_photo && $this->employee_sign)
        {
            $e_photo = rand().'.'.date('Y-m-d').'.'.time().'.'.'photo_'.$this->employee_photo->getClientOriginalName();
            $upload_photo = $this->employee_photo->storeAs('employee_photo',$e_photo);

            $signature = rand().'.'.date('Y-m-d').'.'.time().'.'.'photo_'.$this->employee_sign->getClientOriginalName();
            $upload_sign = $this->employee_sign->storeAs('employee_sign',$signature);

            $values = array(

                "employee_id" => $this->employee_id,
                "name_english" => $this->name_english,
                "name_bangla" => $this->name_bangla,
                "father_name_english" => $this->father_name_english,
                "father_name_bangla" => $this->father_name_bangla,
                "mother_name_english" => $this->mother_name_english,
                "mother_name_bangla" => $this->mother_name_bangla,
                "spouse_name1" => $this->spouse_name1,
                "spouse_name2" => $this->spouse_name2,
                "date_of_birth" => $this->date_of_birth,
                "blood_group" => $this->blood_group,
                "gender" => $this->gender,
                "marital_status" => $this->marital_status,
                "present_address_english" => $this->present_address_english,
                "present_address_bangla" => $this->present_address_bangla,
                "permanent_address_bangla" => $this->permanent_address_bangla,
                "nid" => $this->nid,
                "mobile" => $this->mobile,
                "email" => $this->email,
                "department_id" => $this->department_id,
                "designation_id" => $this->designation_id,
                "date_of_join" => $this->date_of_join,
                "commission_date" => $this->commission_date,
                "promotion_date" => $this->promotion_date,
                "telephone_office" => $this->telephone_office,
                "telephone_home" => $this->telephone_home,
                "pbx" => $this->pbx,
                "salary" => $this->salary,
                "emergency_contact" => $this->emergency_contact,
                "emergency_relation" => $this->emergency_relation,
                "employee_photo" => $e_photo,
                "employee_sign" => $signature,


                "password" => bcrypt('123456'),
                "user_type" => 'employee',
                "belongs_to" => 2,
                "role_id" => 3,
                "permissions" => implode(',',['create', 'read', 'update', 'delete']),
                "status" => 1,


                "created_at" => Carbon::now(),
                "created_by" => Auth::user()->id,



            );
        }

        else if($this->employee_photo)
        {
            $e_photo = rand().'.'.date('Y-m-d').'.'.time().'.'.'photo_'.$this->employee_photo->getClientOriginalName();
            $upload_photo = $this->employee_photo->storeAs('employee_photo',$e_photo);

            $values = array(

                "employee_id" => $this->employee_id,
                "name_english" => $this->name_english,
                "name_bangla" => $this->name_bangla,
                "father_name_english" => $this->father_name_english,
                "father_name_bangla" => $this->father_name_bangla,
                "mother_name_english" => $this->mother_name_english,
                "mother_name_bangla" => $this->mother_name_bangla,
                "spouse_name1" => $this->spouse_name1,
                "spouse_name2" => $this->spouse_name2,
                "date_of_birth" => $this->date_of_birth,
                "blood_group" => $this->blood_group,
                "gender" => $this->gender,
                "marital_status" => $this->marital_status,
                "present_address_english" => $this->present_address_english,
                "present_address_bangla" => $this->present_address_bangla,
                "permanent_address_bangla" => $this->permanent_address_bangla,
                "nid" => $this->nid,
                "mobile" => $this->mobile,
                "email" => $this->email,
                "department_id" => $this->department_id,
                "designation_id" => $this->designation_id,
                "date_of_join" => $this->date_of_join,
                "commission_date" => $this->commission_date,
                "promotion_date" => $this->promotion_date,
                "telephone_office" => $this->telephone_office,
                "telephone_home" => $this->telephone_home,
                "pbx" => $this->pbx,
                "salary" => $this->salary,
                "emergency_contact" => $this->emergency_contact,
                "emergency_relation" => $this->emergency_relation,
                "employee_photo" => $e_photo,


                "password" => bcrypt('123456'),
                "user_type" => 'employee',
                "belongs_to" => 2,
                "role_id" => 3,
                "permissions" => implode(',',['create', 'read', 'update', 'delete']),

                "status" => 1,

                "created_at" => Carbon::now(),
                "created_by" => Auth::user()->id,
            );
        }
        else if($this->employee_sign)
        {
            $signature = rand().'.'.date('Y-m-d').'.'.time().'.'.'photo_'.$this->employee_sign->getClientOriginalName();
            $upload_sign = $this->employee_sign->storeAs('employee_sign',$signature);
            $values = array(

                "employee_id" => $this->employee_id,
                "name_english" => $this->name_english,
                "name_bangla" => $this->name_bangla,
                "father_name_english" => $this->father_name_english,
                "father_name_bangla" => $this->father_name_bangla,
                "mother_name_english" => $this->mother_name_english,
                "mother_name_bangla" => $this->mother_name_bangla,
                "spouse_name1" => $this->spouse_name1,
                "spouse_name2" => $this->spouse_name2,
                "date_of_birth" => $this->date_of_birth,
                "blood_group" => $this->blood_group,
                "gender" => $this->gender,
                "marital_status" => $this->marital_status,
                "present_address_english" => $this->present_address_english,
                "present_address_bangla" => $this->present_address_bangla,
                "permanent_address_bangla" => $this->permanent_address_bangla,
                "nid" => $this->nid,
                "mobile" => $this->mobile,
                "email" => $this->email,
                "department_id" => $this->department_id,
                "designation_id" => $this->designation_id,
                "date_of_join" => $this->date_of_join,
                "commission_date" => $this->commission_date,
                "promotion_date" => $this->promotion_date,
                "telephone_office" => $this->telephone_office,
                "telephone_home" => $this->telephone_home,
                "pbx" => $this->pbx,
                "salary" => $this->salary,
                "emergency_contact" => $this->emergency_contact,
                "emergency_relation" => $this->emergency_relation,
                "employee_sign" => $signature,



                "password" => bcrypt('123456'),
                "user_type" => 'employee',
                "belongs_to" => 2,
                "role_id" => 3,
                "permissions" => implode(',',['create', 'read', 'update', 'delete']),
                "status" => 1,

                "created_at" => Carbon::now(),
                "created_by" => Auth::user()->id,
            );
        }

        else{

            $values = array(

                "employee_id" => $this->employee_id,
                "name_english" => $this->name_english,
                "name_bangla" => $this->name_bangla,
                "father_name_english" => $this->father_name_english,
                "father_name_bangla" => $this->father_name_bangla,
                "mother_name_english" => $this->mother_name_english,
                "mother_name_bangla" => $this->mother_name_bangla,
                "spouse_name1" => $this->spouse_name1,
                "spouse_name2" => $this->spouse_name2,
                "date_of_birth" => $this->date_of_birth,
                "blood_group" => $this->blood_group,
                "gender" => $this->gender,
                "marital_status" => $this->marital_status,
                "present_address_english" => $this->present_address_english,
                "present_address_bangla" => $this->present_address_bangla,
                "permanent_address_bangla" => $this->permanent_address_bangla,
                "nid" => $this->nid,
                "mobile" => $this->mobile,
                "email" => $this->email,
                "department_id" => $this->department_id,
                "designation_id" => $this->designation_id,
                "date_of_join" => $this->date_of_join,
                "commission_date" => $this->commission_date,
                "promotion_date" => $this->promotion_date,
                "telephone_office" => $this->telephone_office,
                "telephone_home" => $this->telephone_home,
                "pbx" => $this->pbx,
                "salary" => $this->salary,
                "emergency_contact" => $this->emergency_contact,
                "emergency_relation" => $this->emergency_relation,



                "password" => bcrypt('123456'),
                "user_type" => 'employee',
                "belongs_to" => 2,
                "role_id" => 3,
                "permissions" => implode(',',['create', 'read', 'update', 'delete']),
                "status" => 1,

                "created_at" => Carbon::now(),
                "created_by" => Auth::user()->id,
            );

        }

        User::insert($values);
        return redirect()
                ->route('employee.create')
                ->with('success', 'Employee created successfully!');
    }
}