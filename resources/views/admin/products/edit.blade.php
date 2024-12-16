<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Product') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="mb-4 py-3 px-3 w-full rounded-xl bg-red-500 text-white">
                  {{ $error }}
                </div> 
              @endforeach  
            @endif

            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
      
              <!-- Product Name -->
              <div>
                <x-input-label for="name" :value="__('Product Name')" />
                <x-text-input id='name' class="block mt-1 w-full" type="text" name="name" value="{{ $product->name }}" required autofocus autocomplete="product-name" />
              </div>

              <!-- Category Selection -->
              <div class="mt-4">
                <x-input-label for="category_id" :value="__('Category')" />
                <select id="category_id" name="category_id" class="mt-1 border border-slate-300 rounded-lg w-full">
                  <option value="" disabled>{{ __('Select Category') }}</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                  @endforeach
              </select>
              </div>

              <!-- Product Price -->
              <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $product->price }}" required autofocus autocomplete="price" />
              </div>

              <!-- Product Stock -->
              <div class="mt-4">
                <x-input-label for="stock" :value="__('Stock')" />
                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" value="{{ $product->stock }}" required autofocus autocomplete="stock" />
              </div>

              <!-- Product Description -->
               <div class="mt-4">
                <x-input-label for="about" :value="__('Product Description')" />
                <textarea id="about" name="about" rows="5" class="mt-1 border border-slate-300 rounded-lg w-full" required autofocus autocomplete="about">{{ $product->about }}</textarea>
               </div>

              <!-- Product Photo -->
              <div class="mt-4">
                <x-input-label for="photo" :value="__('Photo')" />
                <img src="{{ Storage::url($product->photo) }}" alt="" class="m-4 w-[50px] h-[50px]">
                <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" autofocus autocomplete="photo" />
              </div>
      
              <div class="flex items-center justify-end mt-4">
                  <x-primary-button class="ms-3">
                      {{ __('Update Product') }}
                  </x-primary-button>
              </div>
            </form>
          </div>
      </div>
  </div>
</x-app-layout>
