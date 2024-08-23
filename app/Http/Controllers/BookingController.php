<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // $from = '2023-10-29';
        // $to =  '2023-10-30';
        // $rangeCount = Booking::where(function ($query) use ($from, $to) {
        //     $query->where(function ($query) use ($from, $to) {
        //         $query->where('checkin', '<=', $from)
        //             ->where('checkout', '>=', $from);
        //     })->orWhere(function ($query) use ($from, $to) {
        //         $query->where('checkin', '<=', $to)
        //             ->where('checkout', '>=', $to);
        //     })->orWhere(function ($query) use ($from, $to) {
        //         $query->where('checkin', '>=', $from)
        //             ->where('checkout', '<=', $to);
        //     });
        // })->count();
        //    dd($rangeCount);
        $booking = Booking::get()->toArray();
        $checkin = ['checkin'=> null];
        $checkout = ['checkout'=> null];
       
        foreach($booking as $book){
            $checkin['checkin'] = date('m/d/Y',strtotime($book['checkin'])); 
            $checkout['checkout'] =  date('m/d/Y',strtotime($book['checkout'])); 
        }
    //   $alldates = ['alldates'=> null];
    //     $booking2 = Booking::get();
    //     foreach($booking2 as $book2){
    //         $period= CarbonPeriod::create($book2->checkin, $book2->checkout);
    //         $dates = $period->toArray();
    //         $alldates['alldates'] = $dates; 
    //     }
        // Iterate over the period
       
        
        // Convert the period to an array of dates
       
 
    
        return view('index')->with(compact('booking','checkin','checkout'));
    }
    public function addbooking(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'checkin' => 'required|unique:booking',
                'checkout' => 'required|unique:booking',
                'name' => 'required',
                'description' => 'required',
            ]);
        $from =  $request->input('checkin');
        $to =  $request->input('checkout');
        $rangeCount = Booking::where(function ($query) use ($from, $to) {
            $query->where(function ($query) use ($from, $to) {
                $query->where('checkin', '<=', $from)
                    ->where('checkout', '>=', $from);
            })->orWhere(function ($query) use ($from, $to) {
                $query->where('checkin', '<=', $to)
                    ->where('checkout', '>=', $to);
            })->orWhere(function ($query) use ($from, $to) {
                $query->where('checkin', '>=', $from)
                    ->where('checkout', '<=', $to);
            });
        })->count();
    if($rangeCount == 0){
            $Booked = new Booking();
            $Booked->checkin = $request->input('checkin');
            $Booked->checkout = $request->input('checkout');
            $Booked->name = $request->input('name');
            $Booked->description = $request->input('description');
            $Booked->save();
            return redirect('/')->with('status', 'Booking Added Successfully');
        }
        else
        {
            return redirect('/')->with('error', 'Booking Not Available');
         
        }
        } else {    
            return redirect('/')->with('error', 'Booking Not Added');
        }
    }
    public function booking()
    {  
        $booking = Booking::orderBy('created_at', 'desc')->get()->toArray();
        return view('booking.bookingDetails')->with(compact('booking'));
    }
    public function edit_booking($id)
    {
        $booking = Booking::find($id);
        return view('booking.edit_booking')->with(compact('booking'));   
    }
    public function update_booking(Request $request,$id)
    {
      
        if ($request->isMethod('post')) {

            $request->validate([
                'checkin' => 'required',
                'checkout' => 'required',
                'name' => 'required',
                'description' => 'required',
            ]);

            $Booked = Booking::find($id);
            $Booked->checkin = $request->input('checkin');
            $Booked->checkout = $request->input('checkout');
            $Booked->name = $request->input('name');
            $Booked->description = $request->input('description');
            $Booked->update();
            // Assuming you want to redirect to another page after saving the room
            return redirect('booking')->with('status', 'Booking Updated Successfully');
        } else {    
            return redirect('booking')->with('status', 'Booking Not Updated');
        }
    }

    public function delete_booking($id)
    {
        Booking::where('id', $id)->delete();
        return redirect('booking')->with('status', 'Booking is Deleted');;    
    }
   
}
