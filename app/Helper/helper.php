<?php

use App\Models\User;
use App\Models\Routine;
use App\Models\ContactMessage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

if (!function_exists('serialNumber')) {
    function serialNumber($data, $loop)
    {
        return $data->firstItem() + $loop->index;
    }
}

if (!function_exists('getStatus')) {
    function getStatus(): array
    {
        return [
            [
                'label' => 'Active',
                'value' => 1
            ],
            [
                'label' => 'Inactive',
                'value' => 0
            ],
        ];
    }
}

if (!function_exists('getMessage')) {
    function getMessage()
    {
        return ContactMessage::limit(99)->orderBy('id', 'DESC')->get();
    }
}

if (!function_exists('getMessageCount')) {
    function getMessageCount()
    {
        $messages = ContactMessage::limit(99)->orderBy('id', 'DESC')->get();
        $count = $messages->where('count', 0)->count();
        return $count;
    }
}

if (!function_exists('getCondition')) {
    function getCondition(): array
    {
        return [
            [
                'label' => 'Good',
                'value' => 2
            ],
            [
                'label' => 'Medium',
                'value' => 1
            ],
            [
                'label' => 'Broken',
                'value' => 0
            ],
        ];
    }
}

if (!function_exists('amount_with_discount')) {
    function amount_with_discount($fee_invoice): int
    {
        $total = 0;
        foreach ($fee_invoice as $value) {
            $discount =  $value->amount * $value->discount / 100;
            $amount = $value->discount ? $value->amount - $discount : $value->amount;
            $total += round($amount, 0);
        }
        return $total;
    }
}

if (!function_exists('month_wise_sorting')) {
    function month_wise_sorting($months, $data)
    {
        $month = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($months as $index => $m) {
            $month[$m - 1] = $data[$index];
        }
        return $month;
    }
}

if (!function_exists('user_status')) {
    function user_status($request)
    {
        return User::find($request->id)->update(['status' => $request->status]);
    }
}

if (!function_exists('alert')) {
    function alert($type, $message)
    {
        Session::flash('type', $type);
        Session::flash('message', $message);
        if ($type == 'success') {
            Toastr::success($message, 'Success');
        } elseif ($type == 'error') {
            Toastr::error($message, 'Error');
        } elseif ($type == 'warning') {
            Toastr::warning($message, 'Warning');
        } else {
            Toastr::info($message, 'Info');
        }
        return;
    }
}

if (!function_exists('countTime')) {
    function countTime($time)
    {
        $routine = Routine::get();
        $countTime = \collect($time)->map(fn () => 0);
        foreach ($routine->pluck('time_id') as $r) {
            $countTime[$r - 1] = $r;
        }
        return $countTime;
    }
}

if (! function_exists('formatWithComma')) {
    function formatWithComma($number, $limit = null): string
    {
        return number_format($number, $limit, '.', ',');
    }
}


if (! function_exists('numberToWord')) {
    function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );

        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );

            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );

            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');

            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');

            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');

            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );

            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';

                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }

            $words  = implode( ', ' , $words );

            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' and' , $words );
            }

            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }
}


if (! function_exists('format_date')) {
    function format_date($date)
    {
        return \Illuminate\Support\Carbon::parse($date)->format('jS F-Y');
    }
}

if (!function_exists('getinvoice')) {
    function getinvoice($id)
    {
        return  sprintf('INV-%07d', $id);
    }
}
