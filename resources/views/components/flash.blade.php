@if(session()->has("success"))
    <div 
        class = "fixed rounded-xl bg-blue-300 text-white bottom-3 right-3 py-4 px-4"
        x-data = "{show : true}"
        x-init = "setTimeout(()=> show = false, 4000)"
        x-show = "show">
        <p>{{session()->get("success")}}</p>
    </div>
@endif