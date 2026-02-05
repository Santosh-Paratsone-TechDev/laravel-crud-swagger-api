<?php

namespace App\Swagger;

/**
 * @OA\Info(
 *     title="Laravel 11 API Documentation",
 *     version="1.0.0",
 *     description="Swagger documentation"
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
 */
class SwaggerInfo {}