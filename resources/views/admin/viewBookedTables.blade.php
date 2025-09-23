@extends('admin.mainDesign')

@section('show-bookedtables')
    <table style="border-collapse:collapse; width:100%; font-family: Arial, sans-serif; margin: 10px 0">

        @if (session('danger'))
            <div style="background-color: red; color:white; text-align:center;">
                {{ session('danger') }}
            </div>
        @endif

        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Email</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Number Of Guest</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Time</th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;">Date </th>
                <th style="border:1px solid #ddd; padding:12px; text-align:left;" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($booked_tables as $booked_table)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $booked_table->email }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $booked_table->number_of_guest }}
                    </td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $booked_table->time }}</td>
                    <td style="border:1px solid #ddd; padding:8px; text-align:left;">{{ $booked_table->date }}</td>
                    <td>
                        <a href="{{ route('admin.delivered', $booked_table->id) }}"
                            style="color:#2196F3; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#e7f3ff">Delivered</a>
                        <a href="{{ route('admin.cancel', $booked_table->id) }}"
                            style="color:#f44336; text-decoration:none; padding: 4px 8px; border-radius: 4px;
                        background-color:#ffebee">Cancel</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
