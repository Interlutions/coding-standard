<?php

namespace Interlutions\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class DisallowAnnotationsSniff implements Sniff
{
    /**
     * @var string[]|array
     */
    public $disallowedAnnotations = [];

    /**
     * @var string Error message
     */
    public $errorMessage = 'Use of "@%s" annotation must be omitted';

    public function register()
    {
        return [
            T_DOC_COMMENT_TAG,
        ];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $annotation = ltrim($tokens[$stackPtr]['content'], '@');

        if (in_array($annotation, $this->disallowedAnnotations)) {
            $phpcsFile->addError(
                sprintf($this->errorMessage, $annotation),
                $stackPtr,
                'Invalid'
            );
        }
    }
}
