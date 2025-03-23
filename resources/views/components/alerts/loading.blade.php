@props(['message' => 'Processing...'])
<div class="bg-gray-200 rounded-lg border border-gray-300 p-3 w-full my-3 font-semibold flex justify-center">
    <div class="flex items-center">
        <img src="https://api.iconify.design/line-md:loading-twotone-loop.svg" alt="Loading" width="30">
        <span class="text-gray-700 ml-2">{{ $message }}</span>
    </div>
</div>
