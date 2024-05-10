---
title: Structuring your Livewire projects
published_at: 2024-05-10
tags:
    - Livewire
    - Project structure
---

A while ago I refactored a rather large Livewire application at work to use a pattern inspired by
[Caleb’s fantastic Data Table series](https://livewire.laravel.com/screencast/data-tables/teaser)
(if you haven’t watched those series yet you should just stop reading this right now and go watch
them right now, they are incredible!) In that series, Caleb simply calls his
[full-page component](https://livewire.laravel.com/docs/components#full-page-components) `Page`. I
decided to take that a step further.

Earlier, I had been using descriptive names like `OrdersList` (for the page that lists orders) and
`ProductForm` (for the page where you create a new product), but it didn’t feel completely right.
Especially when Livewire version 3 came out, and Form objects where introduced, the latter caused a
lot of confusion. So I pivoted to instead using **verbs** such as `ListOrders` for my full-page
components, and kept them in a their own Pages-namespace.

```php{1}
{-App\Livewire\Components\OrdersList-}
{+App\Livewire\Pages\ListOrders+}

{-App\Livewire\Components\ProductForm-}
{+App\Livewire\Pages\CreateProduct+}
```

So then `ProductForm` became the name of the Form object, rather than the full-page component, which
made things a lot clearer for me. I would keep the Form objects in a `App\Livewire\Forms` namespace
to keep things nice and tidy.

```
app
└── Livewire
    ├── Forms
    │   └── ProductForm.php
    └── Pages
        ├── CreateProduct.php
        ├── EditProduct.php
        └── ListOrders.php
```

Then I hit another problem. Turned out the form for creating a brand new product, and the form for
editing an existing product wasn’t exactly the same. I had the `CreateProduct` and `EditProduct` -
no issue there. But what about the `ProductForm`? Guess we could go with `CreateProductForm` and
`EditProductForm`. Not optimal, but it could still work. Those directories, however, soon started to
get pretty cluttered.

It was at this point that I watched Caleb’s screencasts. Of course, he didn’t just put the `Page`
component in a generic Pages-directory because that would make no sense at all, but he instead takes
a very CRUD-oriented approach and creates the component at `App\Livewire\Orders\Index\Page`. I
really liked this way of thinking, and it kind of reminded me of Adam Wathan’s
[Cruddy by Design-talk](https://www.youtube.com/watch?v=MF0jFKvS4SI). This appraoch has a lot of
benefits for organising the code, and leaves you with a nice, domain-focused directory structure
where related code goes together.

```
app
└── Livewire
    ├── Orders
    │   ├── Index
    │   │   └── Page.php
    │   └── ...
    └── Products
        └── ...
```

We also have a directory dedicated to our page component where related code can go. Those forms from
before? Just call them `Form` and put them next to their respective page component. If you want to
reuse the same form for both creating and editing, put it in the `Products` directory one level
above.

Not only does it work great for Form objects, but any other related code as well. Say your create
product-form is a multistep form and you need an enum to track the steps. You can simply put that
right beside the page component. Nice, co-located and cohesive.

```
app
└── Livewire
    ├── Orders
    │   └── Index
    │       └── Page.php
    └── Products
        ├── Create
        │   ├── Form.php
        │   ├── Page.php
        │   └── Step.php
        ├── Edit
        │   ├── Form.php
        │   └── Page.php
        └── Index
            └── Page.php
```

The approach sure is nice for simple objects and enums, but it works just as well for nested
components. Sometimes you have very generic components that can go in a namespace such as
`App\Livewire\Common`, but at least for me, more often than not, I tend to extract components that
are specific to a certain page. In those cases, I can just put it together with the page component.
If I have a dialog component for showing information about certain product types at product creation
(kind of a contrived example, sorry for that, but I think you get the gist), you can create a
component right beside the page component.

But just like with full-page components - I’ve noticed that it isn’t too uncommon that I create
accompanying objects for those nested components too, so just like I’ve started naming every
full-page component `Page`, I’ve started naming every nested component `Index`. So if I, for some
reason, need a dedicated Form object for that nested component, I can just put them side-by-side
everything is just nice, co-located and cohesive.

```
app
└── Livewire
    └── Products
        └── Create
            ├── Form.php
            ├── Page.php
            ├── Step.php
            └── TypeInformationDialog
                ├── Form.php
                └── Index.php
```

And just like with Blade components, the `index` part can be omitted when referencing
it in the view:

```
<livewire:products.create.type-information-dialog />
```

So what we've ended up with is an app where basically _every single Livewire component_ is named
either `Page` or `Index`. And let me tell you - it's a delight to work with.
