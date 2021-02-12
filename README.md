# JJLalor
JJ Lalor

Front End Development (React) => Total 29 Hours
Mobile (Markup | 7 hours) 
Desktop (Markup | 6 hours)
Preview Creation on updating Form (JSCanvas | 3 hours)
Cookies and Local Storage (State management)
API implementation (3 hours)
Backend Development(Laravel)
Products
Memorial Card
Traditional Style Memoriam Card
Picture Style memoriam Card
Memories style memorial Card
Bookmarks
Memorial style bookmarks
Acknowledgement Card
Double Sided Folded Horizontally
Double Sided Folded Vertically
Double Sided Folded Horizontally
Single Sided No Fold
Keyring
Wallet
Steps Management
Product defines steps
Get Details and store to DB
Template Management (2 templates)
Defined by Product’s type
Store to DB
Dynamic Content
Deliverables
High Res PDF => Converted by template adding dynamic details
Email System => Attachment
Order Management
Marked as completed/shipped or list orders
Name, Full Shipping address, Email ID, Phone, Qty, Price
Shipping setting
Shipping cost will be varied by shipping location.(dropdown)
Stripe Implementation
API (Laravel)
Get Products
Get Steps
Post Details
Post name
Post address
Post date
Post age
Post profile Picture
Post Verse
Post Border Style
Post Gender
Post font style

Modules
Product (4 hours)
Template (8 hours)
Order (4 hours)
Cover (4 hours)
Front
Back
Inside (get=>details , return=>markup | 8 hours)
Left 
Right 
Verse (get=>details, return => markup or image | 16 hours)
Gender
Name
Date
Quotes
Age
Fonts 
Photo/Profile Picture (8 hours)
Payment through Stripe (16 hours)
 Render (get=>markup, return => PDF | 8 hours)

Total : 76 hours

DataBase

Product
Categories
Sub-categories
Template
Order
Cover
Inside
Verse
Photo
    

API Documentation for the Front End

Get Products (/{category_slug}) / (/{category_slug}/{sub_category_slug})

http://localhost:9090/jjlalor/backend/public/api/category

http://jjlalor-ie.stackstaging.com/app/backend/api/get_products


[
    {
        slug: "memoriam-cards",
        title: "Memoriam Cards",
        width: 96,
        height: 143,

        subproducts: [
            {
                slug: "traditional-memoriam-cards",
                title: "Traditional",
                width: 96,
                height: 143
            },
            {
                slug: "picture-memoriam-cards",
                title: "Picture Styled",
                width: 96,
                height: 143
            }
        ]
    },
    {
        slug: "memories-style-memoriam-card",
        title: "Memories Style Memoriam Card",
        width: 96,
        height: 143,
        subproducts: []
    },
    {
        slug: "memories-memoriam-card",
        title: "Memories Style Memoriam Card",
        width: 96,
        height: 143,
        subproducts: []
    },
    {
        slug: "new-item",
        title: "sad Style Memoriam Card",
        width: 96,
        height: 143,
        subproducts: []
    }
]


Get Steps (/steps/)
Post (category_id, sub_category_id)
[
    {
        cat_id: "memories-style-memoriam-card",
        sub_cat_id: "",
        steps: [
            {
                step_pos: 1,
                step_name: "Choose Front Cover",
                step_body_type: "Cover",
                step_desc: "",
                step_preview: "pre_front.jpg",
                step_body_content: [
                    {
                        image: "front1.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "front2.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "front3.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "front4.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "front5.jpg",
                        name: "w_10_w"
                    }
                ]
            },
            {
                step_pos: 2,
                step_name: "Choose Back Cover",
                step_body_type: "Cover",
                step_desc: "",
                step_preview: "pre_back.jpg",
                step_body_content: [
                    {
                        image: "back1.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "back2.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "back3.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "back4.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "back5.jpg",
                        name: "w_10_w"
                    }
                ]
            },
            {
                step_pos: 3,
                step_name: "Inside Left Cover",
                step_body_type: "Radio",
                step_desc: "Choose gender of Deceased",
                step_preview: "pre_inside_left.jpg",
            },
            {
                step_pos: 4,
                step_name: "Choose Border Style",
                step_body_type: "Cover",
                step_desc: "Choose a border style for your photo.",
                step_preview: "pre_inside_left.jpg",
                step_body_content: [
                    {
                        image: "border_1.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "border_2.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "border_3.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "border_4.jpg",
                        name: "w_10_w"
                    }
                ]
            },
            {
                step_pos: 5,
                step_name: "Choose Verse",
                step_body_type: "Cover",
                step_desc: "Choose a verse.",
                step_preview: "pre_inside_left.jpg",
                step_body_content: [
                    {
                        image: "verse_1.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "verse_2.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "verse_3.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "verse_1.jpg",
                        name: "w_10_w"
                    }
                ]
            },
            {
                step_pos: 6,
                step_name: "Inside Left Details",
                step_body_type: "Form",
                step_desc: "Details of deceased to appear on card.",
                step_preview: "pre_inside_left.jpg",
            },
            {
                step_pos: 7,
                step_name: "Choose Photo",
                step_body_type: "Photo",
                step_desc: "Please click browse to upload and crop a photo for your card.",
                step_preview: "pre_inside_left.jpg",
            },
            {
                step_pos: 8,
                step_name: "Inside Right Details",
                step_body_type: "Cover Action",
                step_desc: "",
                step_preview: "pre_inside_left.jpg",
                step_body_content: [
                    {
                        image: "v_r_1.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "v_r_2.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "v_r_3.jpg",
                        name: "w_10_w"
                    },
                    {
                        image: "v_r_4.jpg",
                        name: "w_10_w"
                    }
                ]
            }
        ]
    }
]

getTemplate (post : coverId)
[
    {
        cover_id: 1,
        image: "v_r_4.jpg",
        cover_type: "inside_left",
       cover_type_html: `
        <div class="bleed">
        <div class="image_crop ellipse ellipse_fade" style="background-image:url({{img_src}})"></div>
        <h1 style="text-align:center;text-transform: uppercase;">In Loving Memory</h1>
        <p style="text-align:center;" class="breaker">of</p>
        <h2 style="text-align:center;">{{name}}</h2>
        <p style="text-align:center;">{{address}}</p>
        <p style="text-align:center;">who died</p>
        <p style="text-align:center;">on the {{date}}</p>
        <p style="text-align:center;">Aged {{age}} Years</p>
        <p style="text-align:center;">R.I.P.</p>
        <p style="text-align:center;" class="slogan">{{verse}}</p>
        </div>`
    }
]


Query Table :: all nullable/ no validation, cu ko api chaiyo // post ma second choti bata query ID aaucha
ID, category ,sub_category, Front_cover, Back_cover, Inside_right, Inside_left, Border, Gender, Name, Address, Age, Dod, photo, status(0/1)
http://jjlalor-ie.stackstaging.com/app/backend/api/query
:: Post / will send respond in html with query_id in header

[‘query_id’,'step_position','category','sub_category','gender','name','address','age','dod','border','front_cover','back_cover','inside_right','inside_left','cover_type','photo','status']









Orders /

Update: Product html:: must be made longtext in all
Product html_back, product_html_front

Price
[
    {
        id:1,
        category: "Bookmarks",
        quantity: [25,35,50,75,100,125,150,200,250,300,400],
        prices: [92,109,131,164,197,231,250,317,382,438,535],
        additional_qty: 100,
        additional_price: 99,
        includes: "plastic finish"

    },
    {
        id:1,
        category: "Acknowledgement Cards",        
        quantity: [25,35,50,75,100,125,150,200,250,300,400],
        prices: [92,109,131,164,197,231,250,317,382,438,535],
        additional_qty: 100,
        additional_price: 99,
        includes: "envelopes"

    }
]


Let’s plan
	Backend Ma Vainasakeko / Time lagne wale ( 12 hrs  )
Steps ko / 2 hrs 
http://jjlalor-ie.stackstaging.com/app/backend/api/steps/{category}/{sub_category}
getTemplate / 2 hrs  
QueryTable /   2 hrs
Price
http://jjlalor-ie.stackstaging.com/app/backend/api/price/{category}
Query table bata order table ma jada :orders table ko product image pdf ma save garnu paryo / 2 hrs
Orders / 1.5 hrs
Shippings / .5 hrs : http://jjlalor-ie.stackstaging.com/app/backend/api/shipping/{zone}
Stripe Ko Part / 
Order Vaisakepachi, render vako html chai HQpdf ma convert garera email ma as an attachment pathaunu parney re ram dai le vaneka /  2 hrs



Template:
[
    {
        cover_id: 1,
        image: "v_r_4.jpg",
        cover_type: "inside_left",
        html: `
        <html>
        <style>
            .rounded{
                border-radius:100%;
            }
            .rounded_fade{
                border-radius: 100%;
                box-shadow: inset 0px 0px 10px 10px rgba(255,255,255,1);
            }
            .single_border{
                border-radius: 20px;
                padding: 10px;
                border: 5px solid #a28a2a;
            }
        </style>
        <table>
        <tr style="height:{{half_height}}px">
            <td style="padding-top:0;">
            <div style="
            width: {{photo_width}}px;
            height: {{photo_height}}px;
            margin: auto;
            overflow: hidden;
            background: #ddd url('./female.svg') no-repeat center center;
            background-size: 130%;
            background-image:url({{img_src}});" class="{{border_style}}"></div>
            </td>
        </tr>
        
        <tr style="height:{{half_height}}px">
            <td>
                <h1 style="text-align:center;text-transform: uppercase;font-size:{{title_size}}px;">In Loving Memory</h1>
                <p style="text-align:center;margin:0;line-height:{{title_size}}px;" class="breaker">of</p>
                <h2 style="text-align:center;margin:0;line-height:{{big_size}}px;font-size:{{big_size}}px;">{{name}}</h2>
                <p style="text-align:center;margin:0;line-height:{{title_size}}px;font-size:{{normal_size}}px;">{{address}}</p>
                <p style="text-align:center;margin:0;line-height:{{title_size}}px;font-size:{{normal_size}}px;">who died</p>
                <p style="text-align:center;margin:0;line-height:{{title_size}}px;font-size:{{normal_size}}px;">on the {{date}}</p>
                <p style="text-align:center;margin:0;line-height:{{title_size}}px;font-size:{{normal_size}}px;">Aged {{age}} Years</p>
                <p style="text-align:center;margin:0;line-height:{{title_size}}px;font-size:{{normal_size}}px;">R.I.P.</p>
                <p style="text-align:center;font-size:{{normal_size}}px;">{{verse}}</p>
            </td>
        <tr/>
        
        
        
        </table>
        </html>`
    }
]

Front End
Done
Category listing page
Sub Category Listing Page
Chooser Page
Steps Sections
Photo Uploader and Crop
Form inputs
Cover chooser
Verse chooser 
Preview Section
Parse HTML with form inputs
Not Done
Order / Cart
API connections
Backend
Done
Category/Sub category Management
Cover (Create / update / Delete)
Category APIs
Orders Management with API
Pricing Setting
Font Setting
Template Managements
Not Done 
Parse html to PDF
Email
Stripe Payment



[
    {
        "id": 3,
        "category": 1,
        "sub_category": 3,
        "step_position": 1,
        "step_name": "Choose Front Cover",
        "cover_type": "1",
        "step_type": "cover",
        "description": null,
        "created_at": "2021-02-04 16:46:11",
        "updated_at": "2021-02-04 16:46:11"
    },
    {
        "id": 4,
        "category": 1,
        "sub_category": 3,
        "step_position": 2,
        "step_name": "Choose Back Cove",
        "cover_type": "2",
        "step_type": "cover",
        "description": null,
        "created_at": "2021-02-04 16:47:15",
        "updated_at": "2021-02-04 16:47:15"
    },
    {
        "id": 5,
        "category": 1,
        "sub_category": 3,
        "step_position": 3,
        "step_name": "Inside Left Details",
        "cover_type": "3",
        "step_type": "radio",
        "description": "Choose gender of Deceased",
        "created_at": "2021-02-04 16:47:56",
        "updated_at": "2021-02-04 16:48:28"
    },
    {
        "id": 6,
        "category": 1,
        "sub_category": 3,
        "step_position": 4,
        "step_name": "Choose Border Style",
        "cover_type": "3",
        "step_type": "cover",
        "description": "Choose a border style for your photo",
        "created_at": "2021-02-04 16:49:39",
        "updated_at": "2021-02-04 16:49:39"
    },
    {
        "id": 7,
        "category": 1,
        "sub_category": 3,
        "step_position": 5,
        "step_name": "Choose Verse",
        "cover_type": "4",
        "step_type": "cover",
        "description": "Choose a verse",
        "created_at": "2021-02-04 16:50:32",
        "updated_at": "2021-02-04 16:50:32"
    },
    {
        "id": 8,
        "category": 1,
        "sub_category": 3,
        "step_position": 6,
        "step_name": "Inside Left Details",
        "cover_type": "4",
        "step_type": "form",
        "description": "Details of deceased to appear on card.",
        "created_at": "2021-02-04 16:52:30",
        "updated_at": "2021-02-04 16:52:30"
    },
    {
        "id": 9,
        "category": 1,
        "sub_category": 3,
        "step_position": 7,
        "step_name": "Choose Photo",
        "cover_type": "3",
        "step_type": "photo",
        "description": "Please click browse to upload and crop a photo for your card",
        "created_at": "2021-02-04 16:53:24",
        "updated_at": "2021-02-04 16:53:24"
    },
    {
        "id": 10,
        "category": 1,
        "sub_category": 3,
        "step_position": 8,
        "step_name": "Inside Right Details",
        "cover_type": "4",
        "step_type": "cover_action",
        "description": null,
        "created_at": "2021-02-04 16:54:12",
        "updated_at": "2021-02-04 16:54:12"
    }
]














public function steps($category,$subcategory){

        $cat_id = Category::where('slug','=',$category)->get(['id']);
        $sub_cat = Sub_category::where('slug','=',$subcategory)->get(['id']);
        
        $data = DB::table('steps')
                ->where('category','=',$cat_id[0]['id'])
                ->where('sub_category','=',$sub_cat[0]['id'])

	{->DB:raw(cover table chalna paryo where mathi bata k aaucha??? Cover_type aaucha) }-Should be a function which accepts cover_type,cat, sub_cat

                ->get();

        $coverType = Cover::where('category','=',$cat_id[0]['id'])->where('sub_category','=',$sub_cat[0]['id'])->get();
        dd($coverType);

        if(sizeof($data) < 0){
            return response()->json(["message" => "No Steps"],200);
        }
        return response()->json($data, 200);
    }

[
    {
        "id": 2,
        "category": 1,
        "sub_category": 3,
        "step_position": 1,
        "step_name": "Choose Front Cover",
        "cover_type": "1",
        "step_type": "cover",
        "description": null,
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 3,
        "category": 1,
        "sub_category": 3,
        "step_position": 2,
        "step_name": "Choose Back Cove",
        "cover_type": "2",
        "step_type": "cover",
        "description": null,
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 1,
        "category": 1,
        "sub_category": 3,
        "step_position": 3,
        "step_name": "Inside Left Details",
        "cover_type": "3",
        "step_type": "radio",
        "description": "Choose gender of Deceased",
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 1,
        "category": 1,
        "sub_category": 3,
        "step_position": 4,
        "step_name": "Choose Border Style",
        "cover_type": "3",
        "step_type": "cover",
        "description": "Choose a border style for your photo",
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 4,
        "category": 1,
        "sub_category": 3,
        "step_position": 5,
        "step_name": "Choose Verse",
        "cover_type": "4",
        "step_type": "cover",
        "description": "Choose a verse",
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 4,
        "category": 1,
        "sub_category": 3,
        "step_position": 6,
        "step_name": "Inside Left Details",
        "cover_type": "4",
        "step_type": "form",
        "description": "Details of deceased to appear on card.",
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 1,
        "category": 1,
        "sub_category": 3,
        "step_position": 7,
        "step_name": "Choose Photo",
        "cover_type": "3",
        "step_type": "photo",
        "description": "Please click browse to upload and crop a photo for your card",
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    },
    {
        "id": 4,
        "category": 1,
        "sub_category": 3,
        "step_position": 8,
        "step_name": "Inside Right Details",
        "cover_type": "4",
        "step_type": "cover_action",
        "description": null,
        "created_at": "2021-01-22 10:48:48",
        "updated_at": "2021-01-22 10:59:01",
        "name": "Memoriam Card update",
        "photo": "uQ5szhNH735tyrf0ub8.jpg",
        "cover_type_html": "<p>some <b>text <u>More</u></b></p>",
        "cover_type_text": "Some Text should be here"
    }
]




