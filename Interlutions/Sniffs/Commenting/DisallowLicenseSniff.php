<?php

namespace Interlutions\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class DisallowLicenseSniff implements Sniff
{
    /**
     * @var string
     */
    public $checkPattern = '/copyright|\(c\)|©/';

    /**
     * @var string
     */
    public $errorMessage = 'Copyright marks are forbidden';

    /**
     * jo copyright is mir egal
     */
    public function register()
    {
        return [
            T_COMMENT,
            T_DOC_COMMENT_STRING
        ];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $methodsOrClassesBefore = $phpcsFile->findNext([T_FUNCTION, T_CLASS], $stackPtr);
        $methodsOrClassesAfter = $phpcsFile->findPrevious([T_FUNCTION, T_CLASS], $stackPtr);

        if (false !== $methodsOrClassesBefore && false !== $methodsOrClassesAfter) {
            return;
        }

        if (preg_match($this->checkPattern, $tokens[$stackPtr]['content']) > 0) {
            $phpcsFile->addError(
                $this->errorMessage,
                $stackPtr,
                'Invalid'
            );
        }
    }
}
