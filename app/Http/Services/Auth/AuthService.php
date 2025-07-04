<?php

namespace App\Http\Services\Auth;

use App\Models\User;
use App\Models\Area;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthService{

    public function register($data)
    {
        DB::beginTransaction();
        try {
            $area = Area::where('zipCode', $data['zipCode'])->first();
            if($area){
                $zipCode = $area->zipCode;
            }
            else{
                $area = Area::create([
                    'zipCode' => $data['zipCode'],
                    'city' => $data['city'],
                ]);
                $zipCode = $area->zipCode;
            }

            $data['free_trial'] = isset($data['free_trial']) ? 1 : 0;
            $data['password'] = Hash::make($data['password']);
            $data['area_of_practice'] = json_encode($data['area_of_practice']);
            // $data['zip'] = $data['zipCode'];
            if ($data['free_trial']) {
                $data['start_date'] = date('Y-m-d');
                $data['end_date'] = date('Y-m-d', strtotime('+3 month'));
            }

            if (isset($data['attorney_image']) && $data['attorney_image'] instanceof \Illuminate\Http\UploadedFile) {
                $destinationPath = public_path('media/attorney');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $fileName = time() . '_' . $data['attorney_image']->getClientOriginalName();
                $data['attorney_image']->move($destinationPath, $fileName);
                $data['attorney_image'] = $fileName;
            } else {
                $data['attorney_image'] = null;
            }

            $user = User::create([
                'name' => $data['login_name'] ?? null,
                'company_name' => $data['company_name'] ?? null,
                'address1' => $data['address1'] ?? null,
                'address2' => $data['address2'] ?? null,
                'city' => $data['city'] ?? null,
                'state' => $data['state'] ?? null,
                'mobile' => $data['phone'] ?? null,
                'area_of_practice' => $data['area_of_practice'] ?? null,
                'state_of_bar_admission_and_court' => $data['state_of_bar_admission_and_court'] ?? null,
                'year_of_admission_to_bar' => $data['year_of_admission_to_bar'] ?? null,
                'email' => $data['email'] ?? null,
                'website' => $data['website'] ?? null,
                'login_name' => $data['login_name'] ?? null,
                'password' => $data['password'] ?? null,
                'free_trial' => $data['free_trial'],
                'user_type' => 'attorny',
                'status' => 1,
                'payment_status' => 0,
                'image' => $data['attorney_image'],
                'start_date' => $data['start_date'] ?? null,
                'end_date' => $data['end_date'] ?? null,
            ]);

            $user->zip = $zipCode . $user->id;
            $user->save();

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            // Optionally log the error or rethrow
            throw $e;
        }
    }
}