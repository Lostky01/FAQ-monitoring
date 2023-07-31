Public Class SS99
    Private Sub btnConfess_Click(sender As Object, e As EventArgs) Handles btnConfess.Click
        Dim loveMessage As String = "Do you love me?"
        Dim result As DialogResult = MessageBox.Show(loveMessage, "Confession of Love", MessageBoxButtons.YesNo, MessageBoxIcon.Question)

        If result = DialogResult.Yes Then
            MessageBox.Show("I love you too!", "Love Confirmed", MessageBoxButtons.OK, MessageBoxIcon.Information)
        Else
            MessageBox.Show("That's okay. Maybe someday!", "No Love", MessageBoxButtons.OK, MessageBoxIcon.Information)
        End If
    End Sub
End Class