<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $email = [
		'strEmail'        =>  ['label' => 'Email Address', 'rules' => 'required|valid_email|is_unique[users.strEmail]']
        
	];
	public $email_errors = [
        'strEmail'    => [
			'required'    => 'Email cannot be empty.',
            'valid_email' => 'Please check the Email field. It does not appear to be valid.'
        ]
	];
	public $signup = [
		'strFullName'     => ['label' => 'Full Name', 'rules' => 'required|alpha_space'],
		'intAge'     =>  ['label' => 'Age', 'rules' => 'required|is_natural_no_zero'],
		'strUserName'     =>  ['label' => 'Username', 'rules' => 'required|min_length[5]|is_unique[users.strUserName]'],
		'strEmail'        =>  ['label' => 'Email Address', 'rules' => 'required|valid_email|is_unique[users.strEmail]'],
        'strPassWord'     =>  ['label' => 'Password', 'rules' => 'required|alpha_numeric|min_length[6]']
        // 'pass_confirm' => 'required|matches[password]',
        
	];
	public $signup_errors = [
        'strFullName' => [
            'required'    => 'Fullname cannot be empty.',
		],
		'intAge' => [
            'required'    => 'Age cannot be empty.',
		],
		'strUserName' => [
            'required'    => 'Username cannot be empty.',
		],
        'strEmail'    => [
			'required'    => 'Email cannot be empty.',
            'valid_email' => 'Please check the Email field. It does not appear to be valid.'
        ],
		'strPassWord' => [
            'required'    => 'Password cannot be empty.',
        ]
	];
	public $newpost = [
		'bannerHeader'     => ['label' => 'Post Title', 'rules' => 'required|max_length[255]'],
		'bannerSubHeader'     =>  ['label' => 'Post Sub Title', 'rules' => 'required|max_length[255]'],
		'bodyFrstHeading'     =>  ['label' => 'Post First Header', 'rules' => 'required|max_length[255]'],
		'bodyFrstBlockQuote'  =>  ['label' => 'Post Quote', 'rules' => 'required|max_length[255]'],
		'bodyScndHeading'     =>  ['label' => 'Post Second Header', 'rules' => 'required|max_length[255]'],
		'bodyImgCaption'     =>  ['label' => 'Post Body Image Caption', 'rules' => 'required|max_length[255]'],
		'bodyFrstPara'     =>  ['label' => 'Post First Paragraph', 'rules' => 'required'],
		'bodyScndPara'     =>  ['label' => 'Post Second Paragraph', 'rules' => 'required'],
		'bannerimage'     =>  ['label' => 'Post Banner Image', 'rules' => 'required'],
		'bodyimage'     =>  ['label' => 'Post Body Image', 'rules' => 'required']
        // 'pass_confirm' => 'required|matches[password]',
        
    ];
	public $newpost_errors = [
        'bannerHeader' => [
            'required'    => 'Post Title cannot be empty.',
		],
		'bannerSubHeader' => [
            'required'    => 'Post Sub Title cannot be empty.',
		],
		'bodyFrstHeading' => [
            'required'    => 'Post First Header cannot be empty.',
		],
        'bodyFrstBlockQuote'    => [
            'required'    => 'Post Quote cannot be empty.',
        ],
		'bodyScndHeading' => [
            'required'    => 'Post Second Header cannot be empty.',
        ],
		'bodyImgCaption' => [
            'required'    => 'Post Body Image Caption cannot be empty.',
        ],
		'bodyFrstPara' => [
            'required'    => 'Post First Paragraph cannot be empty.',
        ],
		'bodyScndPara' => [
            'required'    => 'Post Second Paragraph cannot be empty.',
        ],
		'bannerimage' => [
            'required'    => 'Post Banner Image cannot be empty.',
        ],
		'bodyimage' => [
            'required'    => 'Post Body Image cannot be empty.',
        ]
	];
	public $editpost = [
		'bannerHeader'     => ['label' => 'Post Title', 'rules' => 'required|max_length[255]'],
		'bannerSubHeader'     =>  ['label' => 'Post Sub Title', 'rules' => 'required|max_length[255]'],
		'bodyFrstHeading'     =>  ['label' => 'Post First Header', 'rules' => 'required|max_length[255]'],
		'bodyFrstBlockQuote'  =>  ['label' => 'Post Quote', 'rules' => 'required|max_length[255]'],
		'bodyScndHeading'     =>  ['label' => 'Post Second Header', 'rules' => 'required|max_length[255]'],
		'bodyImgCaption'     =>  ['label' => 'Post Body Image Caption', 'rules' => 'required|max_length[255]'],
		'bodyFrstPara'     =>  ['label' => 'Post First Paragraph', 'rules' => 'required'],
		'bodyScndPara'     =>  ['label' => 'Post Second Paragraph', 'rules' => 'required'],
		
        
    ];
	public $editpost_errors = [
        'bannerHeader' => [
            'required'    => 'Post Title cannot be empty.',
		],
		'bannerSubHeader' => [
            'required'    => 'Post Sub Title cannot be empty.',
		],
		'bodyFrstHeading' => [
            'required'    => 'Post First Header cannot be empty.',
		],
        'bodyFrstBlockQuote'    => [
            'required'    => 'Post Quote cannot be empty.',
        ],
		'bodyScndHeading' => [
            'required'    => 'Post Second Header cannot be empty.',
        ],
		'bodyImgCaption' => [
            'required'    => 'Post Body Image Caption cannot be empty.',
        ],
		'bodyFrstPara' => [
            'required'    => 'Post First Paragraph cannot be empty.',
        ],
		'bodyScndPara' => [
            'required'    => 'Post Second Paragraph cannot be empty.',
        ]
	];
	public $changepassword = [
		'npassword'     =>  ['label' => 'New Password', 'rules' => 'required|alpha_numeric|min_length[6]'],
        'cpassword' => ['label' => 'Confirm Password','rules' =>'required|matches[npassword]'],
        
	];
	public $changepassword_errors = [
		'npassword' => [
            'required'    => 'New Password cannot be empty.',
		],
		'cpassword' => [
            'required'    => 'Confirm Password cannot be empty.',
        ]
	];
}
