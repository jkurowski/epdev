<?php

if (! function_exists('inlineEditButton')) {
    function inlineEditButton(int $id, string $fields, $imgwidth = '', $imgheight = '')
    {
        if (!auth()->check()) {
            return ''; // Return nothing if user is not authenticated
        }

        return '<div class="inline-btn">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#inlineModal" 
                        data-inline="'.$id.'" data-hideinput="'.$fields.'" 
                        data-method="update" data-imgwidth="'.$imgwidth.'" data-imgheight="'.$imgheight.'">
                        <svg width="20px" height="20px" viewBox="0 -0.5 21 21" version="1.1" 
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-419.000000, -359.000000)" fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M384,209.210475 L384,219 L363,219 L363,199.42095 L373.5,199.42095 
                                            L373.5,201.378855 L365.1,201.378855 L365.1,217.042095 L381.9,217.042095 
                                            L381.9,209.210475 L384,209.210475 Z M370.35,209.51395 L378.7731,201.64513 
                                            L380.4048,203.643172 L371.88195,212.147332 L370.35,212.147332 L370.35,209.51395 Z 
                                            M368.25,214.105237 L372.7818,214.105237 L383.18415,203.64513 L378.8298,199 
                                            L368.25,208.687714 L368.25,214.105237 Z" id="edit_cover-[#1481]"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>';
    }
}