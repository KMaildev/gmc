<table class="table">
    <thead>
        <tr>
            <th style="color: white; text-align: center; width: 1%;">#</th>
            <th style="width: 3vh; text-align: center;">Owner Name</th>
            <th style="width: 3vh; text-align: center;">Company Name</th>
            <th style="width: 3vh; text-align: center;">Dealer Code</th>
            <th style="width: 3vh; text-align: center;">City</th>
            <th style="width: 3vh; text-align: center;">Address</th>
            <th style="width: 3vh; text-align: center;">Phone</th>
            <th style="width: 3vh; text-align: center;">Email</th>
            <th style="width: 3vh; text-align: center;">Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $key => $customer)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $customer->name }}
                </td>
                <td>
                    {{ $customer->company_name }}
                </td>
                <td>
                    {{ $customer->dealer_code }}
                </td>
                <td>
                    {{ $customer->city }}
                </td>
                <td>
                    {{ $customer->phone }}
                </td>
                <td>
                    {{ $customer->email }}
                </td>
                <td>
                    {{ $customer->address }}
                </td>

                <td>
                    {{ $customer->description }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
