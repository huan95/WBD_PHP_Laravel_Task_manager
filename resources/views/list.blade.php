<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
     <script type="text/javascript">
        <!-- Begin
        function toSpans(span) {
            var str=span.firstChild.data;
            var a=str.length;
            span.removeChild(span.firstChild);
            for(var i=0; i<a; i++) {
                var theSpan=document.createElement("SPAN");
                theSpan.appendChild(document.createTextNode(str.charAt(i)));
                span.appendChild(theSpan);
            }
        }

        function RainbowSpan(span, hue, deg, brt, spd, hspd) {
            this.deg=(deg==null?360:Math.abs(deg));
            this.hue=(hue==null?0:Math.abs(hue)%360);
            this.hspd=(hspd==null?3:Math.abs(hspd)%360);
            this.length=span.firstChild.data.length;
            this.span=span;
            this.speed=(spd==null?50:Math.abs(spd));
            this.hInc=this.deg/this.length;
            this.brt=(brt==null?255:Math.abs(brt)%256);
            this.timer=null;
            toSpans(span);
            this.moveRainbow();
        }
        RainbowSpan.prototype.moveRainbow = function() {
            if(this.hue>359) this.hue-=360;
            var color;
            var b=this.brt;
            var a=this.length;
            var h=this.hue;

            for(var i=0; i<a; i++) {

                if(h>359) h-=360;

                if(h<60) { color=Math.floor(((h)/60)*b); red=b;grn=color;blu=0; }
                else if(h<120) { color=Math.floor(((h-60)/60)*b); red=b-color;grn=b;blu=0; }
                else if(h<180) { color=Math.floor(((h-120)/60)*b); red=0;grn=b;blu=color; }
                else if(h<240) { color=Math.floor(((h-180)/60)*b); red=0;grn=b-color;blu=b; }
                else if(h<300) { color=Math.floor(((h-240)/60)*b); red=color;grn=0;blu=b; }
                else { color=Math.floor(((h-300)/60)*b); red=b;grn=0;blu=b-color; }

                h+=this.hInc;

                this.span.childNodes[i].style.color="rgb("+red+", "+grn+", "+blu+")";
            }
            this.hue+=this.hspd;
        }
    </script>
    <marquee id="marq" scrollamount="10" direction="" loop="50" scrolldelay="0" behavior="Alternate"
             onmouseover="this.stop()" onmouseout="this.start()">
        <center><h2 id="r1" style="color: white; margin-bottom: 50px; margin-top: 50px">LIST CUSTOMER</h2></center>
    </marquee>
    <script type="text/javascript">
        var r1=document.getElementById("r1"); //get span to apply rainbow
        var myRainbowSpan=new RainbowSpan(r1, 0, 360, 255, 50, 18); //apply static rainbow effect
        myRainbowSpan.timer=window.setInterval("myRainbowSpan.moveRainbow()", myRainbowSpan.speed);
    </script>


</head>
<body class="fontnen">
<div class="col-md-12 ">
    <!--        list-->
    <table class="table table-hover">
        <thead>
        <tr>
            <th style="color: white; text-align: center">ID</th>
            <th style="color: white; text-align: center">User Name</th>
            <th style="color: white; text-align: center">Phone</th>
            <th style="color: white; text-align: center">Email</th>
            <th style="color: white; text-align: center">Manipulation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td style="color: white; text-align: center">{{ $customer->id }}</td>
                <td style="color: white; text-align: center">{{ $customer->full_name }}</td>
                <td style="color: white; text-align: center">{{ $customer->phone_number }}</td>
                <td style="color: white; text-align: center">{{ $customer->email }}</td>
                <td style="color: white; text-align: center"><a href="{{ route('customer_update', $customer->id) }}"
                                                                class="btn btn-info"> Edit </a> <a
                            href="{{ route('customer_delete', $customer->id) }}"
                            onclick=" return confirm('Do you want to delete?')" class="btn btn-info">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{ route('customer_add') }}" class="btn btn-info">ADD</a>
    <a href="{{ route('home_list') }}" class="btn btn-info">BACK</a>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</html>