<?php

namespace App\Exports;

use App\Models\User;
use App\Models\service;
use App\Models\location;
use App\Models\ImageGallery;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


class VendorExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    protected $dataValue;

    function __construct($dataValue)
    {
        $this->dataValue = $dataValue;
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["Vednor ID","Vednor First Name", "Vendor Last Name", "Vendor Email","Vendor Password", "Vendor Contact","Vendor Company", "Business Category","Image","Status","locations","Gallery Images"];
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return User::select('name','last_name','email')->get();
        // dd('collection');
        if ($this->dataValue == null) {
            // dd('here-null');
            return User::where('type', 2)->orderBy('id', 'desc')->select('id','name', 'last_name', 'email','show_password','contact','company','show_bus_cat','profile_image_path','show_status','locations')->get();

        } elseif ($this->dataValue == 10) {
            // dd('here-10');

            $users = User::where('type', 2)->orderBy('id', 'desc')->select('users.id','users.name','users.last_name', 'users.email','users.show_password','users.contact','users.company','users.show_bus_cat','users.profile_image_path','users.show_status','user_locations.locations','image_galleries.image')->join('user_locations','user_locations.user_id','users.id')->join('image_galleries','image_galleries.user_id','users.id')->where('image_galleries.wedding_id', '=', null)->take(10)->get();
            // dd($users);
            $data = $users->toArray();
            $allTasks = new Collection();
            $tasks = [];
            foreach($data as $item){

                $services_array = json_decode($item['locations']);
                $single_service_list = [];
                    for($x = 0; $x < count($services_array); $x++){
                        // dd(count($services_array));
                        $services_list = location::where('id',$services_array[$x])->first();
                        // dd($services_list);
                        $single_service_list[$x] = $services_list->location;

                    }
                $gallery_array = json_decode($item['image']);
                // dd($gallery_array);
                $newArr = [];
                $imgae_url = env('APP_URL').'/'.'storage/uploads/cms/';
                if(!empty($gallery_array)){

                    for($x = 0; $x < count($gallery_array); $x++){
                        array_push($newArr, $imgae_url.''.$gallery_array[$x]);
                    }
                }
                // dd($newArr);
                    array_push($tasks,[
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'last_name' => $item['last_name'],
                    'email' => $item['email'],
                    'show_password' => $item['show_password'],
                    'contact' => $item['contact'],
                    'company' => $item['company'],
                    'show_bus_cat' => $item['show_bus_cat'],
                    'profile_image_path' => $item['profile_image_path'],
                    'show_status' => $item['show_status'],
                    'locations' => implode(', ', $single_service_list),
                    'image' => implode(', ', $newArr),
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

        } elseif ($this->dataValue == 50) {
            // dd('here-50');
            $users = User::where('type', 2)->orderBy('id', 'desc')->select('users.id','users.name','users.last_name', 'users.email','users.show_password','users.contact','users.company','users.show_bus_cat','users.profile_image_path','users.show_status','user_locations.locations','image_galleries.image')->join('user_locations','user_locations.user_id','users.id')->join('image_galleries','image_galleries.user_id','users.id')->where('image_galleries.wedding_id', '=', null)->take(50)->get();
            // dd($users);
            $data = $users->toArray();
            $allTasks = new Collection();
            $tasks = [];
            foreach($data as $item){

                $services_array = json_decode($item['locations']);
                $single_service_list = [];
                    for($x = 0; $x < count($services_array); $x++){
                        // dd(count($services_array));
                        $services_list = location::where('id',$services_array[$x])->first();
                        // dd($services_list);
                        $single_service_list[$x] = $services_list->location;

                    }
                $gallery_array = json_decode($item['image']);
                // dd($gallery_array);
                $newArr = [];
                $imgae_url = env('APP_URL').'/'.'storage/uploads/cms/';
                if(!empty($gallery_array)){

                    for($x = 0; $x < count($gallery_array); $x++){
                        array_push($newArr, $imgae_url.''.$gallery_array[$x]);
                    }
                }
                // dd($newArr);
                    array_push($tasks,[
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'last_name' => $item['last_name'],
                    'email' => $item['email'],
                    'show_password' => $item['show_password'],
                    'contact' => $item['contact'],
                    'company' => $item['company'],
                    'show_bus_cat' => $item['show_bus_cat'],
                    'profile_image_path' => $item['profile_image_path'],
                    'show_status' => $item['show_status'],
                    'locations' => implode(', ', $single_service_list),
                    'image' => implode(', ', $newArr),
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
        } elseif ($this->dataValue == 100) {
            // dd('here-100');
            $users = User::where('type', 2)->orderBy('id', 'desc')->select('users.id','users.name','users.last_name', 'users.email','users.show_password','users.contact','users.company','users.show_bus_cat','users.profile_image_path','users.show_status','user_locations.locations','image_galleries.image')->join('user_locations','user_locations.user_id','users.id')->join('image_galleries','image_galleries.user_id','users.id')->where('image_galleries.wedding_id', '=', null)->take(100)->get();
            // dd($users);
            $data = $users->toArray();
            $allTasks = new Collection();
            $tasks = [];
            foreach($data as $item){

                $services_array = json_decode($item['locations']);
                $single_service_list = [];
                    for($x = 0; $x < count($services_array); $x++){
                        // dd(count($services_array));
                        $services_list = location::where('id',$services_array[$x])->first();
                        // dd($services_list);
                        $single_service_list[$x] = $services_list->location;

                    }
                $gallery_array = json_decode($item['image']);
                // dd($gallery_array);
                $newArr = [];
                $imgae_url = env('APP_URL').'/'.'storage/uploads/cms/';
                if(!empty($gallery_array)){

                    for($x = 0; $x < count($gallery_array); $x++){
                        array_push($newArr, $imgae_url.''.$gallery_array[$x]);
                    }
                }
                // dd($newArr);
                    array_push($tasks,[
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'last_name' => $item['last_name'],
                    'email' => $item['email'],
                    'show_password' => $item['show_password'],
                    'contact' => $item['contact'],
                    'company' => $item['company'],
                    'show_bus_cat' => $item['show_bus_cat'],
                    'profile_image_path' => $item['profile_image_path'],
                    'show_status' => $item['show_status'],
                    'locations' => implode(', ', $single_service_list),
                    'image' => implode(', ', $newArr),
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
            $users = User::where('type', 2)->orderBy('id', 'desc')->select('users.id','users.name','users.last_name', 'users.email','users.show_password','users.contact','users.company','users.show_bus_cat','users.profile_image_path','users.show_status','user_locations.locations','image_galleries.image')->join('user_locations','user_locations.user_id','users.id')->join('image_galleries','image_galleries.user_id','users.id')->where('image_galleries.wedding_id', '=', null)->take(500)->get();
            // dd($users);
            $data = $users->toArray();
            $allTasks = new Collection();
            $tasks = [];
            foreach($data as $item){

                $services_array = json_decode($item['locations']);
                $single_service_list = [];
                    for($x = 0; $x < count($services_array); $x++){
                        // dd(count($services_array));
                        $services_list = location::where('id',$services_array[$x])->first();
                        // dd($services_list);
                        $single_service_list[$x] = $services_list->location;

                    }
                $gallery_array = json_decode($item['image']);
                // dd($gallery_array);
                $newArr = [];
                $imgae_url = env('APP_URL').'/'.'storage/uploads/cms/';
                if(!empty($gallery_array)){

                    for($x = 0; $x < count($gallery_array); $x++){
                        array_push($newArr, $imgae_url.''.$gallery_array[$x]);
                    }
                }
                // dd($newArr);
                    array_push($tasks,[
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'last_name' => $item['last_name'],
                    'email' => $item['email'],
                    'show_password' => $item['show_password'],
                    'contact' => $item['contact'],
                    'company' => $item['company'],
                    'show_bus_cat' => $item['show_bus_cat'],
                    'profile_image_path' => $item['profile_image_path'],
                    'show_status' => $item['show_status'],
                    'locations' => implode(', ', $single_service_list),
                    'image' => implode(', ', $newArr),
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
        $users = User::where('type', 2)->orderBy('id', 'desc')->select('users.id','users.name','users.last_name', 'users.email','users.show_password','users.contact','users.company','users.show_bus_cat','users.profile_image_path','users.show_status','user_locations.locations','image_galleries.image')->join('user_locations','user_locations.user_id','users.id')->join('image_galleries','image_galleries.user_id','users.id')->where('image_galleries.wedding_id', '=', null)->get();
            // dd($users);
            $data = $users->toArray();
            $allTasks = new Collection();
            $tasks = [];
            foreach($data as $item){

                $services_array = json_decode($item['locations']);
                $single_service_list = [];
                    for($x = 0; $x < count($services_array); $x++){
                        // dd(count($services_array));
                        $services_list = location::where('id',$services_array[$x])->first();
                        // dd($services_list);
                        $single_service_list[$x] = $services_list->location;

                    }
                $gallery_array = json_decode($item['image']);
                // dd($gallery_array);
                $newArr = [];
                $imgae_url = env('APP_URL').'/'.'storage/uploads/cms/';
                if(!empty($gallery_array)){

                    for($x = 0; $x < count($gallery_array); $x++){
                        array_push($newArr, $imgae_url.''.$gallery_array[$x]);
                    }
                }
                // dd($newArr);
                    array_push($tasks,[
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'last_name' => $item['last_name'],
                    'email' => $item['email'],
                    'show_password' => $item['show_password'],
                    'contact' => $item['contact'],
                    'company' => $item['company'],
                    'show_bus_cat' => $item['show_bus_cat'],
                    'profile_image_path' => $item['profile_image_path'],
                    'show_status' => $item['show_status'],
                    'locations' => implode(', ', $single_service_list),
                    'image' => implode(', ', $newArr),
                    ]);
            }
            // dd($tasks);
            for($i = 0; $i < count($tasks); $i++){
                $allTasks->push(($tasks[$i]));

            }
            
            // dd($allTasks);
            return $allTasks;

        // return User::where('type',2)->where('status',1)->whereNotNull('shipmentID')->orderBy('claimDate','desc')->get()
    }
}
