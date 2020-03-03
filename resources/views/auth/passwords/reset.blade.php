@extends('layout.client')

@section('content')



    <div class="result_wrap">
        <form method="post" action="{{url('/password/reset')}}" >
            {{csrf_field()}}
            <input type="hidden" name="token" value="{{$token}}"  >
            <input type="hidden" name="email" value="{{$email}}" >
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>new password：</th>
                    <td>
                        <input type="password" name="password"> </i>new password 6-20</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>password confirm：</th>
                    <td>
                        <input type="password" name="password_confirmation"> </i>confirm</span>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="submit">
                        <input type="button" class="back" onclick="history.go(-1)" value="return">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection

