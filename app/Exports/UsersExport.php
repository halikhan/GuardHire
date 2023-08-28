<?php

namespace App\Exports;

use App\Models\User;
use App\Models\service;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
// use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;


class UsersExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    protected $dataValue;

    function __construct($dataValue)
    {
        $this->dataValue = $dataValue;
    }
    // use Exportable;
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["User ID","Groom First Name","Groom Last Name", "Groom Email", "Groom Phone","Bride First Name","Bride Last Name","Bride Email","Bride Phone","Date","City","Password", "Image Link", "Status", "Services"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::select('name','last_name','email')->get();
        // return User::where('type',3)->orderBy('id','desc')->select('groom_first_name','groom_last_name','email')->get();
             // dd('collection');


            if ($this->dataValue == null) {
                // dd('here-null');

                return User::where('type', 3)->orderBy('id', 'desc')->select('id','groom_first_name','groom_last_name', 'email','groom_phone','bride_first_name','bride_last_name','bride_email','bride_phone','date','city','show_password','profile_image_path','show_status')->join('user_services','user_services.user_id','users.id')->get();

            }
            elseif ($this->dataValue == 10) {
                $users = User::where('type', 3)->orderBy('id', 'desc')->select('users.id','users.groom_first_name','users.groom_last_name', 'users.email','users.groom_phone','users.bride_first_name','users.bride_last_name','users.bride_email','users.bride_phone','users.date','users.city','users.show_password','users.profile_image_path','users.show_status','user_services.services')->join('user_services','user_services.user_id','users.id')->take(10)->get();

                $data = $users->toArray();
                $allTasks = new Collection();
                // dd($data);
                $tasks = [];

                foreach($data as $item){

                    $services_array = json_decode($item['services']);
                    $single_service_list = [];

                        for($x = 0; $x < count($services_array); $x++){
                            // dd(count($services_array));
                            $services_list = service::where('id',$services_array[$x])->first();
                            // dd($services_list);
                            $single_service_list[$x] = $services_list->service;

                        }

                    array_push($tasks,[
                        'id' => $item['id'],
                        'groom_first_name' => $item['groom_last_name'],
                        'groom_last_name' => $item['groom_last_name'],
                        'email' => $item['email'],
                        'groom_phone' => $item['groom_phone'],
                        'bride_first_name' => $item['bride_first_name'],
                        'bride_last_name' => $item['bride_last_name'],
                        'bride_email' => $item['bride_email'],
                        'bride_phone' => $item['bride_phone'],
                        'date' => $item['date'],
                        'city' => $item['city'],
                        'show_password' => $item['show_password'],
                        'profile_image_path' => $item['profile_image_path'],
                        'show_status' => $item['show_status'],
                        'services' => implode(', ', $single_service_list),
                    ]);
                }
                // dd($tasks);

                for($i = 0; $i < count($tasks); $i++){
                    $allTasks->push(($tasks[$i]));

                }
                foreach ($tasks as $task) {

                }
                // dd($allTasks);
                return $allTasks;

            }
            elseif ($this->dataValue == 50) {
                // dd('here-100');
                $users = User::where('type', 3)->orderBy('id', 'desc')->select('users.id','users.groom_first_name','users.groom_last_name', 'users.email','users.groom_phone','users.bride_first_name','users.bride_last_name','users.bride_email','users.bride_phone','users.date','users.city','users.show_password','users.profile_image_path','users.show_status','user_services.services')->join('user_services','user_services.user_id','users.id')->take(50)->get();

                $data = $users->toArray();
                $allTasks = new Collection();
                // dd($data);
                $tasks = [];

                foreach($data as $item){

                    $services_array = json_decode($item['services']);
                    $single_service_list = [];

                        for($x = 0; $x < count($services_array); $x++){
                            // dd(count($services_array));
                            $services_list = service::where('id',$services_array[$x])->first();
                            // dd($services_list);
                            $single_service_list[$x] = $services_list->service;

                        }

                    array_push($tasks,[
                        'id' => $item['id'],
                        'groom_first_name' => $item['groom_last_name'],
                        'groom_last_name' => $item['groom_last_name'],
                        'email' => $item['email'],
                        'groom_phone' => $item['groom_phone'],
                        'bride_first_name' => $item['bride_first_name'],
                        'bride_last_name' => $item['bride_last_name'],
                        'bride_email' => $item['bride_email'],
                        'bride_phone' => $item['bride_phone'],
                        'date' => $item['date'],
                        'city' => $item['city'],
                        'show_password' => $item['show_password'],
                        'profile_image_path' => $item['profile_image_path'],
                        'show_status' => $item['show_status'],
                        'services' => implode(', ', $single_service_list),
                    ]);
                }
                // dd($tasks);



                for($i = 0; $i < count($tasks); $i++){
                    $allTasks->push(($tasks[$i]));

                }

                foreach ($tasks as $task) {

                }
                // dd($allTasks);
                return $allTasks;

            }
            elseif ($this->dataValue == 100) {
                // dd('here-100');
                $users = User::where('type', 3)->orderBy('id', 'desc')->select('users.id','users.groom_first_name','users.groom_last_name', 'users.email','users.groom_phone','users.bride_first_name','users.bride_last_name','users.bride_email','users.bride_phone','users.date','users.city','users.show_password','users.profile_image_path','users.show_status','user_services.services')->join('user_services','user_services.user_id','users.id')->take(100)->get();

                $data = $users->toArray();
                $allTasks = new Collection();
                // dd($data);
                $tasks = [];

                foreach($data as $item){

                    $services_array = json_decode($item['services']);
                    $single_service_list = [];

                        for($x = 0; $x < count($services_array); $x++){
                            // dd(count($services_array));
                            $services_list = service::where('id',$services_array[$x])->first();
                            // dd($services_list);
                            $single_service_list[$x] = $services_list->service;

                        }

                    array_push($tasks,[
                        'id' => $item['id'],
                        'groom_first_name' => $item['groom_last_name'],
                        'groom_last_name' => $item['groom_last_name'],
                        'email' => $item['email'],
                        'groom_phone' => $item['groom_phone'],
                        'bride_first_name' => $item['bride_first_name'],
                        'bride_last_name' => $item['bride_last_name'],
                        'bride_email' => $item['bride_email'],
                        'bride_phone' => $item['bride_phone'],
                        'date' => $item['date'],
                        'city' => $item['city'],
                        'show_password' => $item['show_password'],
                        'profile_image_path' => $item['profile_image_path'],
                        'show_status' => $item['show_status'],
                        'services' => implode(', ', $single_service_list),
                    ]);
                }
                // dd($tasks);



                for($i = 0; $i < count($tasks); $i++){
                    $allTasks->push(($tasks[$i]));

                }

                foreach ($tasks as $task) {

                }
                // dd($allTasks);
                return $allTasks;
            }
            elseif ($this->dataValue == 500) {
                // dd('here-500');
                $users = User::where('type', 3)->orderBy('id', 'desc')->select('users.id','users.groom_first_name','users.groom_last_name', 'users.email','users.groom_phone','users.bride_first_name','users.bride_last_name','users.bride_email','users.bride_phone','users.date','users.city','users.show_password','users.profile_image_path','users.show_status','user_services.services')->join('user_services','user_services.user_id','users.id')->take(500)->get();

                $data = $users->toArray();
                $allTasks = new Collection();
                // dd($data);
                $tasks = [];

                foreach($data as $item){

                    $services_array = json_decode($item['services']);
                    $single_service_list = [];

                        for($x = 0; $x < count($services_array); $x++){
                            // dd(count($services_array));
                            $services_list = service::where('id',$services_array[$x])->first();
                            // dd($services_list);
                            $single_service_list[$x] = $services_list->service;

                        }

                    array_push($tasks,[
                        'id' => $item['id'],
                        'groom_first_name' => $item['groom_last_name'],
                        'groom_last_name' => $item['groom_last_name'],
                        'email' => $item['email'],
                        'groom_phone' => $item['groom_phone'],
                        'bride_first_name' => $item['bride_first_name'],
                        'bride_last_name' => $item['bride_last_name'],
                        'bride_email' => $item['bride_email'],
                        'bride_phone' => $item['bride_phone'],
                        'date' => $item['date'],
                        'city' => $item['city'],
                        'show_password' => $item['show_password'],
                        'profile_image_path' => $item['profile_image_path'],
                        'show_status' => $item['show_status'],
                        'services' => implode(', ', $single_service_list),
                    ]);
                }
                // dd($tasks);



                for($i = 0; $i < count($tasks); $i++){
                    $allTasks->push(($tasks[$i]));

                }

                foreach ($tasks as $task) {

                }
                // dd($allTasks);
                return $allTasks;
            }
            else
            return User::where('type', 3)->orderBy('id', 'desc')->select('users.id','users.groom_first_name','users.groom_last_name', 'users.email','users.groom_phone','users.bride_first_name','users.bride_last_name','users.bride_email','users.bride_phone','users.date','users.city','users.show_password','users.profile_image_path','users.show_status','user_services.services')->join('user_services','user_services.user_id','users.id')->get();
                // return User::where('type',2)->where('status',1)->whereNotNull('shipmentID')->orderBy('claimDate','desc')->get()
    }



}
