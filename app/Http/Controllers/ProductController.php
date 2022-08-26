<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index( Request $request ) {
        $search = $request->input( 'search' );

        $products = Product::query()
            ->where( 'name', 'like', "%{$search}%" )
            ->orWhere( 'code', 'like', "%{$search}%" )
            ->get();

        return $products;
    }

    public function create() {
        //
    }

    public function store( Request $request ) {
        $rules = [
            'code'                => 'required|min:2|max:255',
            'name'                => 'required|min:3|max:255',
            'type'                => 'required|min:3|max:255',
            'durability'          => 'required|max:255',
            'max_durability'      => 'required|max:255',
            'price'               => 'required|max:255',
            'minimum_rent_period' => 'required|max:255',
        ];

        $this->validate( $request, $rules );

        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->type = $request->type;
        $product->availability = $request->availability;
        $product->needing_repair = $request->needing_repair;
        $product->durability = $request->durability;
        $product->max_durability = $request->max_durability;
        $product->mileage = $request->mileage;
        $product->price = $request->price;
        $product->minimum_rent_period = $request->minimum_rent_period;
        $product->save();
        return $product;
    }

    public function show( $id ) {
        //
    }

    public function edit( $id ) {
        $product = Product::where( 'id', $id )->firstOrFail();
        return $product;
    }

    public function update( Request $request, $id ) {
        $rules = [
            'code'                => 'required|min:3|max:255',
            'name'                => 'required|min:3|max:255',
            'type'                => 'required|min:3|max:255',
            'durability'          => 'required|max:255',
            'max_durability'      => 'required|max:255',
            'mileage'             => 'required|max:255',
            'price'               => 'required|max:255',
            'minimum_rent_period' => 'required|max:255',
        ];

        $this->validate( $request, $rules );

        $product = Product::whereId( $id )->update( [
            'code'                => $request->code,
            'name'                => $request->name,
            'type'                => $request->type,
            'availability'        => $request->availability,
            'needing_repair'      => $request->needing_repair,
            'durability'          => $request->durability,
            'max_durability'      => $request->max_durability,
            'mileage'             => $request->mileage,
            'price'               => $request->price,
            'minimum_rent_period' => $request->minimum_rent_period,
        ] );

        return $product;
    }

    public function destroy( $id ) {
        Product::where( 'id', $id )->firstOrFail()->delete();
        return 'Product Deleted Successfully.';
    }
}
