<style>
    .flex-1 {
      flex: 1;
    }
    
    .h-12 {
      height: 3rem;
    }
    
    .border {
      border-width: 1px;
    }
    
    .-mt-px {
      margin-top: -1px;
    }
    
    .-ml-px {
      margin-left: -1px;
    }
    
    .flex {
      display: flex;
    }
    
    .items-center {
      align-items: center;
    }
    
    .justify-center {
      justify-content: center;
    }
    
    .bg-indigo-100 {
      background-color: #e0e7ff;
    }
    
    .text-gray-900 {
      color: #111827;
    }
    
    .min-width {
      min-width: 10rem;
    }
    
    .text-sm {
      font-size: 0.875rem;
    }
</style>
<div class="flex-1 h-12 border -mt-px -ml-px flex items-center justify-center bg-indigo-100 text-gray-900"
     style="min-width: 10rem;">

    <p class="text-sm">
        {{ $day->format('l') }}
    </p>
</div>
