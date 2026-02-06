<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *     title="Laravel CRUD API - Swagger Documentation",
 *     version="1.0.0",
 *     description="Complete REST API for User, Product, and Order Management with Swagger documentation"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\SecurityRequirement(
 *     security={{"bearerAuth":{}}}
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Authentication endpoints - Login, Register, Logout"
 * )
 * 
 * @OA\Tag(
 *     name="Users",
 *     description="User management endpoints - CRUD operations"
 * )
 * 
 * @OA\Tag(
 *     name="Products",
 *     description="Product management endpoints - CRUD operations"
 * )
 * 
 * @OA\Tag(
 *     name="Orders",
 *     description="Order management endpoints - CRUD operations"
 * )
 */
class SwaggerInfo {
}
