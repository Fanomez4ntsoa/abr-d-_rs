<?php



namespace App\Http\Controllers;



use App\Models\Badge;

use Carbon\Carbon;

use Illuminate\Http\Request;



class BadgeController extends Controller

{

    // public function badge(){

    

    //     $currentDate = Carbon::now();

    

    //     // $page_data['badge'] = Badge::whereDate('start_date', '<=', $currentDate)

    //     //     ->whereDate('end_date', '>=', $currentDate)

    //     //     ->orderBy('id', 'DESC')

    //     //     ->first();



    //     $page_data['badges'] = Badge::where('user_id', auth()->user()->id)

    //         ->orderBy('id', 'DESC')

    //         ->get();



    //     $page_data['view_path'] = 'frontend.badge.badge';

    //     return view('frontend.index', $page_data);

    // }

    // public function badge_info(){

    //     $page_data['view_path'] = 'frontend.badge.badge_info';

    //     return view('frontend.index', $page_data);

    // }

    // public function payment_configuration($id, Request $request)
    // {

    //     $request->validate([

    //         'title' => 'required',

    //         'description' => 'required',

    //     ]);

       



    //     $badge_pay =  get_settings('badge_price');

    //     $title = $request->title;

    //     $description = $request->description;

    //     $start_timestamp = strtotime($request->start_date . ' ' . date('H:i:s'));

    //     $end_timestamp = strtotime('+30 days', $start_timestamp);

    //     $start_date = date('Y-m-d H:i:s', $start_timestamp);

    //     $end_date = date('Y-m-d H:i:s', $end_timestamp);

        

    //     $payment_details = [

    //         'items' => [

    //             [

    //                 'id' => $id,

    //                 'title' => $title,

    //                 'subtitle' => $description,

    //                 'price' => $badge_pay, 

    //                 'discount_price' => 0,

    //                 'discount_percentage' => 0,

    //             ]

    //         ],

    //         'custom_field' => [

    //             'start_date' => date('Y-m-d H:i:s', $start_timestamp),

    //             'end_date' => date('Y-m-d H:i:s', $end_timestamp),

    //             'user_id' => auth()->user()->id,

    //             'description' => $description,

    //         ],

    //         'success_method' => [

    //             'model_name' => 'Badge',

    //             'function_name' => 'add_payment_success',

    //         ],

    //         'tax' => 0,

    //         'coupon' => null,

    //         'payable_amount' => $badge_pay, 

    //         'cancel_url' => route('badge'),

    //         'success_url' => route('payment.success', ''),

    //     ];

    //     session(['payment_details' => $payment_details]);

    //     return redirect()->route('payment');

    // }

    public function badge($type = 'simple')
    {
       $currentDate = Carbon::now();
        // $page_data['badge'] = Badge::whereDate('start_date', '<=', $currentDate)
        //     ->whereDate('end_date', '>=', $currentDate)
        //     ->orderBy('id', 'DESC')
        //     ->first();

        if($type == 'pro'){
            $page_data['badges'] = Badge::where('user_id', auth()->user()->id)
                ->where('type', 'pro')
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $page_data['badges'] = Badge::where('user_id', auth()->user()->id)
                ->where('type', 'simple')
                ->orderBy('id', 'DESC')
                ->get();
        }

        $page_data['badge_type'] = $type;
        $page_data['view_path'] = 'frontend.badge.badge';

        return view('frontend.index', $page_data);
    }

    public function badge_info(Request $request)
    {
        // Récuperer le type, avec 'simple' comme valeur par défaut
        $view_type = $request->type ?? $request->badge_type ?? 'simple';
        
        // le prix en fonction du type
        $badge_price = $view_type === 'pro' ? get_settings('badge_price_pro') : get_settings('badge_price');

        // Préparer les données pour la vue
        $page_data['view_path'] = 'frontend.badge.badge_info';
        $page_data['view_type'] = $view_type;
        $page_data['badge_price'] = $badge_price;
        
        return view('frontend.index', $page_data);
    }

    public function payment_configuration($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // 🟢 Récupère le type envoyé via le formulaire
        $type = $request->badge_type ?? 'simple';

        // 🔁 Choix du prix en fonction du type
        $badge_pay = get_settings($type === 'pro' ? 'badge_price_pro' : 'badge_price');
        // $badge_pay =  get_settings('badge_price');
        $title = $request->title;
        $description = $request->description;
        $start_timestamp = strtotime($request->start_date . ' ' . date('H:i:s'));
        $end_timestamp = strtotime('+30 days', $start_timestamp);
        $start_date = date('Y-m-d H:i:s', $start_timestamp);
        $end_date = date('Y-m-d H:i:s', $end_timestamp);

        $payment_details = [
            'items' => [
                [
                    'id' => $id,
                    'title' => $title,
                    'subtitle' => $description,
                    'price' => $badge_pay, 
                    'discount_price' => 0,
                    'discount_percentage' => 0,
                ]
            ],

            'custom_field' => [
                'start_date' => date('Y-m-d H:i:s', $start_timestamp),
                'end_date' => date('Y-m-d H:i:s', $end_timestamp),
                'user_id' => auth()->user()->id,
                'description' => $description,
            ],

            'success_method' => [
                'model_name' => 'Badge',
                'function_name' => 'add_payment_success',
            ],

            'tax' => 0,
            'coupon' => null,
            'payable_amount' => $badge_pay, 
            // 'cancel_url' => route('badge'),
            'cancel_url' => route('badge', ['type' => $type]),
            'success_url' => route('payment.success', ''),
        ];

        session(['payment_details' => $payment_details]);
        return redirect()->route('payment');
    }

}

